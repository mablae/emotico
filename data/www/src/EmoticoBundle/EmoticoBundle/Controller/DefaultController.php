<?php

namespace EmoticoBundle\EmoticoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Verbs
 */
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
/**
 * FOS
 */
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use EmoticoBundle\EmoticoBundle\Entity\Item;

/**
 * Class DefaultController
 * @package EmoticoBundle\EmoticoBundle\Controller
 */
class DefaultController extends FOSRestController{

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get all emoticos",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emoticos found"
     *  },
     * )
     * @Route("/emotico/api")
     * @Method({"GET"})
     */
    public function getAction()
    {
        $response = array(
            '1'=>array('title'=>'happyness', 'description'=>'what could happines mean','status'=>1, 'user'=>123123123123),
            '1'=>array('title'=>'fun', 'description'=>'what could fun mean','status'=>1, 'user'=>534345345543),
            );

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get a specific emotico",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emotico found for this id"
     *  },
     * )
     *
     * @Route("/emotico/api/{id}")
     * @Method({"GET"})
     *
     */
    public function getByIdAction($id)
    {
        $response = array(
            '1'=>array('title'=>'happyness', 'description'=>'what could happines mean'),
        );

        return new JsonResponse($response, 200);
    }

    /**
     * @ApiDoc(
     *  description="Update a property of a emotico",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="User already exist"
     *  },
     * )
     * @Route("/emotico/{Id}")
     * @Method({"Put"})
     * @ParamConverter("Emotico", class="EmoticoBundleEmoticoBundle:Item")
     * @param \EmoticoBundle\EmoticoBundle\Entity\Item $emotico
     * @return Response
     */
    public function putAction(Item $emotico)
    {
        $response = $emotico->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}