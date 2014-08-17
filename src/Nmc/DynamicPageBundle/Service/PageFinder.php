<?php
/**
 * Created by PhpStorm.
 * User: Nikoms
 * Date: 17/08/14
 * Time: 18:02
 */

namespace Nmc\DynamicPageBundle\Service;


use Nmc\DynamicPageBundle\Entity\Page;
use Nmc\DynamicPageBundle\Entity\Website;

class PageFinder implements PageFinderInterface{
    private $website;

    /**
     * @param Website $website
     */
    public function __construct(Website $website)
    {
        $this->website = $website;
    }

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->website->getPages();
    }


} 