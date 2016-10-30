<?php

namespace Mittax\MessageBundle\Controller;

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
use Mittax\MessageBundle\Service\Manager;
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
     * @Route("/message")
     * @Method({"GET"})
     */
    public function getAction()
    {
        return $this->fetchAll('MittaxMessageBundle:Message');
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
     * @Route("/message/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:Message")
     * @Method({"GET"})
     * @param Message $message
     * @return JsonResponse
     *
     */
    public function getByIdAction(Message $message)
    {
        return $message->toJsonResponse($this->container->get('jms_serializer'));
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="delete a specific message",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No Message found for this id"
     *  },
     * )
     *
     * @Route("/message/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:Message")
     * @Method({"DELETE"})
     * @param Message $message
     * @return JsonResponse
     */
    public function deleteAction(Message $message)
    {
        return $this->deleteByItem($message);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="send a message",
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No Message found for this id"
     *  },
     * )
     *
     * @Route("/message/{id}/send")
     * @ParamConverter("id", class="MittaxMessageBundle:Message")
     * @Method({"GET"})
     * @param Message $message
     * @return JsonResponse
     */
    public function send(Message $message)
    {
        /** @var $serviceManager \Mittax\MessageBundle\Service\Manager */
        $serviceManager = $this->get('mittax_message.servicemanager');

        $serviceManager->setMessage($message)->send();

        return $message->toJsonResponse($this->container->get('jms_serializer'));
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
     * @Route("/message")
     * @Method({"POST"})
     * @ParamConverter("message", converter="fos_rest.request_body")
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
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Message already exist"
     *  },
     * )
     * @Route("/message/{id}")
     * @Method({"PUT"})
     * @ParamConverter("message", converter="fos_rest.request_body")
     *
     * @param \Mittax\MessageBundle\Entity\Message $message
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
     *  section = "Emotico/Message",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Message already exist"
     *  },
     * )
     * @Route("/message/sample/test")
     * @Method({"GET"})
     * @return Response
     */
    public function sampleAction()
    {
        $message = new Message();

        $message->setSubject("a title");

        $message->setContent("a description");

        $message->setCreatedAt(new \DateTime());

        $response = $message->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}