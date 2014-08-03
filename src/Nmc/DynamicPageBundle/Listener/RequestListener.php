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
        $page = $event->getRequest()->attributes->get('page');
        //Set local from the page language
        if($page !== null){
            $event->getRequest()->setLocale($page->getLocale());
        }
    }

} 