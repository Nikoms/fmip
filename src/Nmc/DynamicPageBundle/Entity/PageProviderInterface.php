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
     * @param int $websiteId
     * @return Page[]
     */
    public function getPagesByWebsiteId($websiteId);
} 