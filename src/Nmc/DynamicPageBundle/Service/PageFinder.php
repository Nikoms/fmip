<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 18:02
 */

namespace Nmc\DynamicPageBundle\Service;


use Nmc\DynamicPageBundle\Entity\Page;
use Nmc\DynamicPageBundle\Entity\PageProviderInterface;

class PageFinder implements PageFinderInterface{

    /**
     * @var int
     */
    private $websiteId;

    /**
     * @param PageProviderInterface $pageProvider
     * @param int $websiteId
     */
    public function __construct(PageProviderInterface $pageProvider, $websiteId)
    {
        $this->pageProvider = $pageProvider;
        $this->websiteId = (int) $websiteId;
    }

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->pageProvider->getPagesByWebsiteId($this->websiteId);
    }


} 