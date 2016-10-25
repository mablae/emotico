<?php

namespace EmoticoBundle\EmoticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends FOSRestController
{

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Add user to db",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="User already exist"
     *  },
     * )
     * @Get("/emotico/api")
     */
    public function getAction()
    {
        return $this->render('EmoticoBundleEmoticoBundle:Default:index.html.twig');
    }

    /**
     * @ApiDoc(
     *  description="Update emotico",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="User already exist"
     *  },
     * )
     * @Post("/emotico/api")
     */
    public function postAction()
    {
        return $this->render('EmoticoBundleEmoticoBundle:Default:index.html.twig');
    }
}
