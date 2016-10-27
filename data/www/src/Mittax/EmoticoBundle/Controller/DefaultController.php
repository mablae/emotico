<?php

namespace Mittax\EmoticoBundle\Controller;

use Mittax\EmoticoBundle\Entity\Item;

use Mittax\CoreBundle\Controller\AbstractController;

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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController
 * @package EmoticoBundle\EmoticoBundle\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get all items",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emoticos found"
     *  },
     * )
     * @Route("/emotico/item")
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
     *  description="get a specific item",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emotico found for this id"
     *  },
     * )
     *
     * @Route("/emotico/item/{id}")
     * @ParamConverter("id", class="MittaxEmoticoBundle:Item")
     * @Method({"GET"})
     *
     */
    public function getByIdAction(Item $item)
    {
        return $item->toJson($this->container->get('jms_serializer'));
    }

    /**
     * @ApiDoc(
     *  description="Adds a emotico",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="User already exist"
     *  },
     * )
     * @Route("/emotico/item")
     * @Method({"POST"})
     * @ParamConverter("item", converter="fos_rest.request_body")
     * @return Response
     */
    public function postAction(Item $item)
    {
        $this->persistAndSave($item);

        return $item->toJson($this->container->get('jms_serializer'));
    }

    /**
     * @ApiDoc(
     *  description="Update a property of a item",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Item already exist"
     *  },
     * )
     * @Route("/emotico/item/{id}")
     * @Method({"Put"})
     * @ParamConverter("Emotico", class="MittaxEmoticoBundle:Item")
     * @param \Mittax\EmoticoBundle\Entity\Item $item
     * @return Response
     */
    public function putAction(Item $item)
    {
        $response = $item->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }

    /**
     * @ApiDoc(
     *  description="Get a sample item",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Item already exist"
     *  },
     * )
     * @Route("/emotico/sample")
     * @Method({"GET"})
     * @return Response
     */
    public function sampleAction()
    {
        $item = new Item();

        $item->setTitle("a title");

        $item->setDescription("a description");

        $item->setCreatedAt(new \DateTime());

        $item->setDeletedAt(new \DateTime());

        $item->getGroupid(1);

        $item->setUserid(1);

        $item->setIconpaths(json_encode(['${mediapath/icon_small.jpg}', '${mediapath/icon_medium.jpg}', '${mediapath/icon_large.jpg}']));

        $response = $item->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}