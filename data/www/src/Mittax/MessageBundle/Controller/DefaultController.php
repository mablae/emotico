<?php

namespace Mittax\MessageBundle\Controller;

use Mittax\EmoticoBundle\Entity\Item;

use Mittax\CoreBundle\Controller\AbstractController;

use Mittax\MessageBundle\Entity\Message;
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
     *  description="get all messages",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emoticos found"
     *  },
     * )
     * @Route("/message/item")
     * @Method({"GET"})
     */
    public function getAction()
    {
        return $this->fetchAll('MittaxMessageBundle:Item');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get a specific message",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No emotico found for this id"
     *  },
     * )
     *
     * @Route("/message/item/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:Message")
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
     *  resource=true,
     *  description="delete a specific message",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No item found for this id"
     *  },
     * )
     *
     * @Route("/message/item/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:Message")
     * @Method({"DELETE"})
     * @param Item $item
     * @return JsonResponse
     */
    public function deleteAction(Item $item)
    {
        return $this->deleteByItem($item);
    }

    /**
     * @ApiDoc(
     *  description="Adds a message",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Bad Request"
     *  },
     * )
     * @Route("/message/item")
     * @Method({"POST"})
     * @ParamConverter("item", converter="fos_rest.request_body")
     *
     * @param Message $message
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function postAction(Message $message, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($message, $validationErrors);
    }

    /**
     * @ApiDoc(
     *  description="Update a message",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Item already exist"
     *  },
     * )
     * @Route("/emotico/message/{id}")
     * @Method({"PUT"})
     * @ParamConverter("message", converter="fos_rest.request_body")
     *
     * @param \Mittax\MessageBundle\Entity\Message $item
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function putAction(Message $message, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($message, $validationErrors);
    }

    /**
     * @ApiDoc(
     *  description="Get a sample message",
     *  section = "Emotico",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Item already exist"
     *  },
     * )
     * @Route("/message/sample")
     * @Method({"GET"})
     * @return Response
     */
    public function sampleAction()
    {
        $item = new Message();

        $item->setSubject("a title");

        $item->setContent("a description");

        $item->setCreatedAt(new \DateTime());

        $item->setDeletedAt(new \DateTime());

        $item->setRecipients([1,2,3]);

        $item->setUserid(1);

        $response = $item->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}