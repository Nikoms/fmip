<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 19:01
 */

namespace Nmc\DynamicPageBundle\Entity;


interface PageProviderInterface {

    /**
     * @return Page[]
     */
    public function getPages();
} 