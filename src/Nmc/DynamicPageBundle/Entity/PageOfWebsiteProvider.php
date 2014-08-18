<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 18-08-14
 * Time: 23:58
 */

namespace Nmc\DynamicPageBundle\Entity;


class PageOfWebsiteProvider implements PageProviderInterface{

    /**
     * @var PageRepository
     */
    private $repository;

    /**
     * @var int
     */
    private $websiteId;

    public function __construct(PageRepository $repository, $websiteId)
    {
        $this->repository = $repository;
        $this->websiteId = (int) $websiteId;;
    }
    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->repository->findBy(array('websiteId' => $this->websiteId));
    }


} 