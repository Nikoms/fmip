<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 17:58
 */

namespace Nmc\DynamicPageBundle\Service;


use Nmc\DynamicPageBundle\Entity\Website;

interface WebsiteFinderInterface {

    /**
     * @return Website
     */
    public function getWebsite();
} 