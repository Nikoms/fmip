<?php

namespace Nmc\DynamicPageBundle\Entity;

interface WebsiteProviderInterface{
    /**
     * @param string $hostName
     * @return Website
     */
    public function findOneByHost($hostName);

    /**
     * @return Website
     */
    public function findDefaultWebsite();
}