<?php

namespace Mittax\CoreBundle\Controller;

use Mittax\EmoticoBundle\Entity\IEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class AbstractController extends FOSRestController implements IController
{
    /**
     * @param IEntity $entity
     * @return Response
     */
    public function deleteByItem(IEntity $entity)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($entity);

        $em->persist($entity);

        $em->flush();

        $response = array('message'=>'success');

        return new Response($response, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    /**
     * @param IEntity $entity
     * @param ConstraintViolationListInterface|null $validationErrors
     * @return Response
     */
    public function persistAndSave(IEntity $entity, ConstraintViolationListInterface $validationErrors = null)
    {
        $request = $this->container->get('request_stack')->getCurrentRequest();

        $entity->setId($request->get('id'));

        if (count($validationErrors) > 0) {

            $errorArray = array();

            foreach($validationErrors as $error)
            {
                $errorArray['errors'][$error->getPropertyPath()] = $error->getMessage();
            }

            return new Response($errorArray, \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }

        $em = $this->getDoctrine()->getManager();

        /**
         * Update Item
         */
        if($entity->getId() > 0)
        {
            $em->merge($entity);

            $em->flush();

            $response = array('message'=>'success', 'return'=>['id'=>$entity->getId()]);

            return new Response($response, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
        }


        $em->persist($entity);

        $em->flush();

        $response = array('message'=>'success', 'return'=>['id'=>$entity->getId()]);

        return new Response($response, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    /**
     * Fetch all Items
     *
     * @return JsonResponse
     */
    public function fetchAll($bundle)
    {
        $repository = $this->getDoctrine()->getRepository($bundle);

        $items = $repository->findAll();

        $list = array();

        foreach ($items as $item) {
            array_push($list,$item->toJson($this->container->get('jms_serializer')));
        }

        return new Response($list, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
