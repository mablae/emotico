<?php

namespace Mittax\MessageBundle\Controller;

use Mittax\CoreBundle\Controller\AbstractController;

use Mittax\MessageBundle\Entity\Message;
use Mittax\MessageBundle\Entity\MessageBox;
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
 * Class MessageBoxController
 * @package EmoticoBundle\EmoticoBundle\Controller
 */
class MessageboxController extends AbstractController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get message stats",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No entries found"
     *  },
     * )
     * @Route("/messagebox")
     * @Method({"GET"})
     */
    public function getAction()
    {
        return $this->fetchAll('MittaxMessageBundle:MessageBox');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="get a specific messagebox item",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No item found for this id"
     *  },
     * )
     *
     * @Route("/messagebox/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:MessageBox")
     * @Method({"GET"})
     * @param MessageBox $messageBox
     * @return JsonResponse
     *
     */
    public function getByIdAction(MessageBox $messageBox)
    {
        return $messageBox->toJsonResponse($this->container->get('jms_serializer'));
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="delete a specific item",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     404="No Message found for this id"
     *  },
     * )
     *
     * @Route("/messagebox/{id}")
     * @ParamConverter("id", class="MittaxMessageBundle:MessageBox")
     * @Method({"DELETE"})
     * @param MessageBox $messageBox
     * @return JsonResponse
     */
    public function deleteAction(MessageBox $messageBox)
    {
        return $this->deleteByItem($messageBox);
    }

    /**
     * @ApiDoc(
     *  description="Adds a message to the messageBox",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Bad Request"
     *  },
     * )
     * @Route("/messagebox")
     * @Method({"POST"})
     * @ParamConverter("messageBox", converter="fos_rest.request_body")
     *
     * @param MessageBox $messageBox
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function postAction(MessageBox $messageBox, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($messageBox, $validationErrors);
    }

    /**
     * @ApiDoc(
     *  description="Update a messageBox Item",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Message already exist"
     *  },
     * )
     * @Route("/messagebox/{id}")
     * @Method({"PUT"})
     * @ParamConverter("messageBox", converter="fos_rest.request_body")
     *
     * @param \Mittax\MessageBundle\Entity\MessageBox $messageBox
     * @param ConstraintViolationListInterface $validationErrors
     * @return Response
     */
    public function putAction(MessageBox $messageBox, ConstraintViolationListInterface $validationErrors)
    {
        return $this->persistAndSave($messageBox, $validationErrors);
    }

    /**
     * @ApiDoc(
     *  description="Get a sample messageBox entrie",
     *  section = "Emotico/MessageBox",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="Message already exist"
     *  },
     * )
     * @Route("/messagebox/sample/test")
     * @Method({"GET"})
     * @return Response
     */
    public function sampleAction()
    {
        $messageBox = new MessageBox();

        $messageBox->setClients(['Twillo','Slack','WhatsApp','Skype','FaceBook','LinkedId']);

        $messageBox->setMessageid(1);

        $messageBox->setRecipients([1,2,3,4]);

        $messageBox->setStatus(['Twillo'=>1, 'Slack'=>2]);

        $messageBox->setSender(1);

        $response = $messageBox->toJson($this->container->get('jms_serializer'));

        return new Response($response);
    }
}