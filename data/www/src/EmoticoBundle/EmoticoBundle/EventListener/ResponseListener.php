<?php

namespace EmoticoBundle\EmoticoBundle\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {

        $request = $event->getRequest();
        /* @var $request \Symfony\Component\HttpFoundation\Request */


        $event->setResponse(new Response($_SERVER['HTTP_CONTENT_TYPE'], 200));

        die("".$_SERVER['HTTP_CONTENT_TYPE']);

        if (strstr($request->getRequestFormat(),'json')) {
            $event->setResponse(new Response('json', 200));
        }
        else if (strstr($request->getRequestFormat(),'xml')) {
            $event->setResponse(new Response('xml', 200));
        }
        else
        {
            die(__METHOD__);
        }





        // only do something when the requested format is "json"
        if ($event->getRequest()->getRequestFormat() != 'json') {
            return;
        }

        // only do something when the client accepts "text/html" as response format
        if (false === strpos($request->headers->get('Accept'), 'text/html')) {
            return;
        }

        // set the "Content-Type" header of the response
        $event->getResponse()->headers->set('Content-Type', 'text/plain');
    }
}
