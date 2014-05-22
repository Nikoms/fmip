<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 22/05/14
 * Time: 19:32
 */

namespace Nmc\DynamicPageBundle\Menu;


use Knp\Menu\FactoryInterface;
use Nmc\DynamicPageBundle\Routing\WebsiteFinder;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    /**
     * @var \Knp\Menu\FactoryInterface
     */
    private $factory;

    /**
     * @var \Nmc\DynamicPageBundle\Routing\WebsiteFinder
     */
    private $websiteFinder;


    public function __construct(FactoryInterface $factory, WebsiteFinder $websiteFinder)
    {
        $this->websiteFinder = $websiteFinder;
        $this->factory = $factory;
    }
    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        foreach($this->websiteFinder->getWebsite()->getPages() as $page){
            $menu->addChild($page->getName());
        }
        return $menu;
    }
} 