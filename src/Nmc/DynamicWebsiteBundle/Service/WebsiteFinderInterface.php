<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 17:58
 */

namespace Nmc\DynamicWebsiteBundle\Service;


use Nmc\DynamicWebsiteBundle\Entity\Website;

interface WebsiteFinderInterface {

    /**
     * @return Website
     */
    public function getWebsite();
} 