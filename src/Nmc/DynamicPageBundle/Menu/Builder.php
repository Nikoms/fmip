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
use Nmc\DynamicPageBundle\Entity\PageProviderInterface;
use Nmc\DynamicPageBundle\Service\PageFinderInterface;
use Symfony\Component\HttpFoundation\Request;

class Builder
{
    /**
     * @var PageProviderInterface
     */
    private $pageProvider;

    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $menuFactory;


    /**
     * @param FactoryInterface $menuFactory
     * @param PageProviderInterface $pageProvider
     */
    public function __construct(FactoryInterface $menuFactory, PageProviderInterface $pageProvider)
    {
        $this->pageProvider = $pageProvider;
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
        foreach ($this->pageProvider->getPages() as $page) {
            if ($page->getLocale() !== $locale) {
                continue;
            }
            $menu->addChild($page->getName());
        }

        return $menu;
    }
}