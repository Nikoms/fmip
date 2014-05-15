<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/05/14
 * Time: 18:17
 */

namespace Nmc\DynamicPageBundle\Routing;


use Doctrine\ORM\EntityManager;
use Nmc\DynamicPageBundle\Entity\Website;
use Nmc\DynamicPageBundle\Entity\WebsiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class WebsiteFinder
{
    /**
     * @var Website
     */
    private $website;

    public function __construct(RequestStack $requestStack, EntityManager $entityManager)
    {
        if($requestStack->getCurrentRequest() === null){
            return;
        }
        $this->website = $entityManager->getRepository('NmcDynamicPageBundle:Website')->findOneByHost($requestStack->getCurrentRequest()->getHost());
    }

    /**
     * @return \Nmc\DynamicPageBundle\Entity\Website
     */
    public function getWebsite()
    {
        return $this->website;
    }




}