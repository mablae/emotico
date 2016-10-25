<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{
    public function indexAction()
    {
        return $this->render('ApiBundle:Default:index.html.twig');
    }

    public function testAction()
    {
        return $this->handleView($this->view(array('dasdasd')));
    }

}
