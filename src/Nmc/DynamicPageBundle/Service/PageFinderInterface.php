<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 17:59
 */

namespace Nmc\DynamicPageBundle\Service;


use Nmc\DynamicPageBundle\Entity\Page;

interface PageFinderInterface {

    /**
     * @return Page[]
     */
    public function getPages();
} 