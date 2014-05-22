<?php

namespace Nmc\DynamicPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Block
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nmc\DynamicPageBundle\Entity\BlockRepository")
 */
class Block
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @var array
     *
     * @ORM\Column(name="settings", type="array")
     */
    private $settings;

    /**
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="blocks")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $page;


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
     * @return Block
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set type
     *
     * @param string $type
     * @return Block
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set settings
     *
     * @param array $settings
     * @return Block
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings
     *
     * @return array 
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param \Nmc\DynamicPageBundle\Entity\Page $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return \Nmc\DynamicPageBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
