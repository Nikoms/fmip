<?php
namespace Nmc\DynamicPageBundle\Entity;


interface PageProviderInterface {

    /**
     * @return Page[]
     */
    public function getPages();
} 