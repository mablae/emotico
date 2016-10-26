<?php

namespace EmoticoBundle\EmoticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;



use FOS\RestBundle\Controller\Annotations\Get;


use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;

use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

class DefaultController{

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
     * @Get("/emotico/api/{id}")
     *
     */
    public function getAction($id)
    {
        return new ArrayResponse(array('dasdasd'=>'asdasdsad'));
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
        //return $this->render('EmoticoBundleEmoticoBundle:Default:index.html.twig');
    }
}

class ArrayResponse extends Response
{
    public $data;

    public function __construct($content, $status=null, array $headers = null)
    {
        $this->data = $content;

        parent::__construct('FakeResponse', 200, array());
    }

    /**
     * @return mixed|string
     */
    public function getData()
    {
        return $this->data;
    }

    

}