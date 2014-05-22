<?php

namespace Nmc\DynamicPageBundle\Controller;

use Nmc\DynamicPageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function pageAction(Page $page)
    {
        $view = (string) $page->getTemplate() !== '' ? $page->getTemplate() : 'NmcDynamicPageBundle:Default:index.html.twig';
        return $this->render($view, array('page' => $page));
    }
}
