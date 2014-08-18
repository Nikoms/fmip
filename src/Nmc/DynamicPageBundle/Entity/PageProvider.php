<?php


namespace Nmc\DynamicPageBundle\Entity;


class PageProvider implements PageProviderInterface{
    /**
     * @var PageRepository
     */
    private $repository;


    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Page[]
     */
    public function getPages()
    {
        return $this->repository->findAll();
    }


} 