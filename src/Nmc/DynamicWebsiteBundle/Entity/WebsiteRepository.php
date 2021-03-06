<?php

namespace Nmc\DynamicWebsiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * WebsiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WebsiteRepository extends EntityRepository implements WebsiteProviderInterface
{
    /**
     * @param $hostName
     * @return Website
     */
    public function findOneByHost($hostName)
    {
        return $this->findOneBy(array('host' => $hostName));
    }
}
