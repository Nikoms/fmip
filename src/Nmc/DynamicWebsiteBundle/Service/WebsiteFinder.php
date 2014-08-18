<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/05/14
 * Time: 18:17
 */

namespace Nmc\DynamicWebsiteBundle\Service;


use Nmc\DynamicWebsiteBundle\Entity\Website;
use Nmc\DynamicWebsiteBundle\Exception\WebsiteNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Nmc\DynamicWebsiteBundle\Entity\WebsiteProviderInterface;

class WebsiteFinder implements WebsiteFinderInterface
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
     * @param WebsiteProviderInterface $websiteProvider
     * @param Request $request
     */
    public function __construct(WebsiteProviderInterface $websiteProvider, Request $request = null)
    {
        $this->currentHost = $request !== null ? $request->getHost() : '';
        $this->websiteProvider = $websiteProvider;
    }

    private function initWebsite()
    {
        try{
            $this->website = $this->websiteProvider->findOneByHost($this->currentHost);
            if($this->website === null){
                throw new WebsiteNotFoundException();
            }
        }catch (\Exception $ex){
            //Could be PDOException too
            $this->initEmptyWebsite();
        }
    }

    private function initEmptyWebsite()
    {
        $this->website = new Website();
        $this->website->setHost($this->currentHost);
    }

    /**
     * @return Website
     */
    public function getWebsite()
    {
        if($this->website === null){
            $this->initWebsite();
        }

        return $this->website;
    }
}