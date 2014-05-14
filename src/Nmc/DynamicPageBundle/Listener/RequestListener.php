<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 12/05/14
 * Time: 21:13
 */

namespace Nmc\DynamicPageBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (HttpKernelInterface::MASTER_REQUEST != $event->getRequestType()) {
            return;
        }
//        $event->getRequest()->attributes->set('_controller', 'Nmc\DynamicPageBundle\Controller\DefaultController::pageAction');
//        echo $event->getRequest()->getHost();
//        exit();
    }

} 