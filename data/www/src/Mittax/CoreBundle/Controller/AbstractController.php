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
     * @param ConstraintViolationListInterface|null $validationErrors
     * @return array
     */
    public function persistAndSave(IEntity $entity, ConstraintViolationListInterface $validationErrors = null)
    {
        if (count($validationErrors) > 0) {

            $errorArray = array();

            foreach($validationErrors as $error)
            {
                $errorArray['errors'][$error->getPropertyPath()] = $error->getMessage();
            }

            return new JsonResponse($errorArray, \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
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

            return new JsonResponse($response, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
        }


        $em->persist($entity);

        $em->flush();

        $response = array('message'=>'success', 'return'=>['id'=>$entity->getId()]);

        return new JsonResponse($response, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
