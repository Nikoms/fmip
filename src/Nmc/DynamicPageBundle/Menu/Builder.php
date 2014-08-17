<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 22/05/14
 * Time: 19:32
 */

namespace Nmc\DynamicPageBundle\Menu;


use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Nmc\DynamicPageBundle\Service\PageFinderInterface;
use Symfony\Component\HttpFoundation\Request;

class Builder
{
    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $menuFactory;


    /**
     * @var \Nmc\DynamicPageBundle\Service\PageFinderInterface
     */
    private $pageFinder;


    /**
     * @param FactoryInterface $menuFactory
     * @param PageFinderInterface $pageFinder
     */
    public function __construct(FactoryInterface $menuFactory, PageFinderInterface $pageFinder)
    {
        $this->pageFinder = $pageFinder;
        $this->menuFactory = $menuFactory;
    }

    /**
     * @param Request $request
     * @return \Knp\Menu\ItemInterface
     */
    public function createMainMenu(Request $request)
    {
        return $this->fillMenu($this->menuFactory->createItem('root'), $request->getLocale());
    }

    /**
     * @param ItemInterface $menu
     * @param string $locale
     * @return ItemInterface
     */
    private function fillMenu(ItemInterface $menu, $locale)
    {
        foreach ($this->pageFinder->getPages() as $page) {
            if ($page->getLocale() !== $locale) {
                continue;
            }
            $menu->addChild($page->getName());
        }

        return $menu;
    }
}