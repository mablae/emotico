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

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="List all emoticos",
     *  section = "Emoticodasdsad",
     *  statusCodes={
     *     200="Returned when successful",
     *     403="Returned when the user is not authorized to say hello"
     *  },
     * )
     * @return array
     */
    public function testdsdsadAction()
    {
        return $this->handleView($this->view(array('this is for testing')));
    }

}
