<?php

namespace Nmc\DynamicPageBundle\Controller;

use Nmc\DynamicPageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(Page $page)
    {
        return $this->render('NmcDynamicPageBundle:Default:index.html.twig', array('page' => $page));
    }
    public function pageAction(Page $page)
    {
        return $this->render('NmcDynamicPageBundle:Default:index.html.twig', array('page' => $page));
    }
}
