<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/05/14
 * Time: 18:17
 */

namespace Nmc\DynamicPageBundle\Routing;


use Nmc\DynamicPageBundle\Entity\Website;
use Symfony\Component\HttpFoundation\RequestStack;
use Nmc\DynamicPageBundle\Entity\WebsiteProviderInterface;

class WebsiteFinder
{
    /**
     * @var Website
     */
    private $website;

    /**
     * @var string
     */
    private $currentHost;

    /**
     * @var WebsiteProviderInterface
     */
    private $websiteProvider;

    /**
     * @param RequestStack $requestStack
     * @param WebsiteProviderInterface $websiteProvider
     */
    public function __construct(RequestStack $requestStack, WebsiteProviderInterface $websiteProvider)
    {
        $this->currentHost = ($requestStack->getCurrentRequest() !== null) ? $requestStack->getCurrentRequest()->getHost() : '';
        $this->websiteProvider = $websiteProvider;
    }

    private function initWebsite()
    {
        try{
            $this->website = $this->websiteProvider->findOneByHost($this->currentHost);
            if($this->website === null){
                $this->websiteProvider->findDefaultWebsite();
            }
        }catch (\Exception $ex){
            //No database?
            $this->website = $this->websiteProvider->findDefaultWebsite();
        }
    }

    /**
     * @return \Nmc\DynamicPageBundle\Entity\Website
     */
    public function getWebsite()
    {
        if($this->website === null){
            $this->initWebsite();
        }
        return $this->website;
    }
}