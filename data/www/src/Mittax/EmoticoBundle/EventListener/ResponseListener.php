<?php

namespace Mittax\EmoticoBundle\EventListener;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use JMS\SerializerBundle\JMSSerializerBundle;

class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {



    }

    public function onKernelRequest($event)
    {



    }
}
