<?php

namespace ST\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ST\CatalogBundle\Entity\Catalog
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Catalog
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @Assert\MinLength(5)
     */
    private $name;

    /**
     * @var integer $depth
     *
     * @ORM\Column(name="depth", type="integer")
     */
    private $depth;

    /**
     * @var integer $sort
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort;

    /**
     * @var integer $stat
     *
     * @ORM\Column(name="stat", type="integer")
     */
    private $stat;

    /**
     * @var datetime $published_at
     *
     * @ORM\Column(name="published_at", type="datetime")
     */
    private $published_at;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set depth
     *
     * @param integer $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * Get depth
     *
     * @return integer 
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set stat
     *
     * @param integer $stat
     */
    public function setStat($stat)
    {
        $this->stat = $stat;
    }

    /**
     * Get stat
     *
     * @return integer 
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * Set published_at
     *
     * @param datetime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;
    }

    /**
     * Get published_at
     *
     * @return datetime 
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }
}
