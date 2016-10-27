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
use Symfony\Component\Validator\ConstraintViolationListInterface;

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
        return $this->fetchAll('MittaxEmoticoBundle:Item');
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
     * @param Item $item
     * @return JsonResponse
     *
     */
    public function getByIdAction(Item $item)
    {
        return $item->toJsonResponse($this->container->get('jms_serializer'));
    }

    /**
     * @ApiDoc(
     *  description="Adds a emotico",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Bad Request"
     *  },
     * )
     * @Route("/emotico/item")
     * @Method({"POST"})
     * @ParamConverter("item", converter="fos_rest.request_body")
     *
     * @param Item $item
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function postAction(Item $item, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($item, $validationErrors);
    }

    /**
     * @ApiDoc(
     *  description="Update an item",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Item already exist"
     *  },
     * )
     * @Route("/emotico/item/{id}")
     * @Method({"PUT"})
     * @ParamConverter("item", converter="fos_rest.request_body")
     *
     * @param \Mittax\EmoticoBundle\Entity\Item $item
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function putAction(Item $item, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($item, $validationErrors);
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

        $item->setGroupid(1);

        $item->setUserid(1);

        $item->setIconpaths(['small'=>'$mediaPath/icons/small.jpg','medium'=>'$mediaPath/icons/small.jpg','large'=>'$mediaPath/icons/small.jpg']);

        $response = $item->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}