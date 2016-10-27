<?php

namespace Mittax\CoreBundle\Controller;

use Mittax\EmoticoBundle\Entity\IEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations;

class AbstractController extends FOSRestController implements IController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('MittaxCoreBundle:Default:index.html.twig');
    }

    /**
     * @param IEntity $entity
     * @return bool
     */
    public function persistAndSave(IEntity $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
        return true;
    }
}
