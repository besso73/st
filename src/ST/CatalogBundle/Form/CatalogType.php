<?php

namespace ST\CatalogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CatalogType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('depth')
            ->add('sort')
            ->add('stat')
            ->add('published_at')
        ;
    }

    public function getName()
    {
        return 'st_catalogbundle_catalogtype';
    }
}
