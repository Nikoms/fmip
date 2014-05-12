<?php

namespace Nmc\DynamicPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NmcDynamicPageBundle:Default:index.html.twig', array('name' => $name));
    }
}
