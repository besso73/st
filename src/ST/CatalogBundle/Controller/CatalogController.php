<?php

namespace ST\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ST\CatalogBundle\Entity\Catalog;
use ST\CatalogBundle\Form\CatalogType;

/**
 * Catalog controller.
 *
 * @Route("/catalog")
 */
class CatalogController extends Controller
{
    /**
     * Lists all Catalog entities.
     *
     * @Route("/", name="catalog")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('STCatalogBundle:Catalog')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Catalog entity.
     *
     * @Route("/{id}/show", name="catalog_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('STCatalogBundle:Catalog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Catalog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Catalog entity.
     *
     * @Route("/new", name="catalog_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Catalog();
        $form   = $this->createForm(new CatalogType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Catalog entity.
     *
     * @Route("/create", name="catalog_create")
     * @Method("post")
     * @Template("STCatalogBundle:Catalog:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Catalog();
        $request = $this->getRequest();
        $form    = $this->createForm(new CatalogType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('catalog_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Catalog entity.
     *
     * @Route("/{id}/edit", name="catalog_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('STCatalogBundle:Catalog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Catalog entity.');
        }

        $editForm = $this->createForm(new CatalogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Catalog entity.
     *
     * @Route("/{id}/update", name="catalog_update")
     * @Method("post")
     * @Template("STCatalogBundle:Catalog:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('STCatalogBundle:Catalog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Catalog entity.');
        }

        $editForm   = $this->createForm(new CatalogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('catalog_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Catalog entity.
     *
     * @Route("/{id}/delete", name="catalog_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('STCatalogBundle:Catalog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Catalog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('catalog'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
