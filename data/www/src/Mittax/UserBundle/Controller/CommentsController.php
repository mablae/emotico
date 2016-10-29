<?php
/**
 * Created by PhpStorm.
 * User: jvolonda
 * Date: 5/25/16
 * Time: 12:09 PM
 */

namespace Mittax\UserBundle\Controller;

use ApiBundle\Entity\UserComment;
use FOS\RestBundle\Controller\FOSRestController;

class CommentsController extends FOSRestController
{
    public function getCommentsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApiBundle:User')->find($id);
        $comments = $user->getComments();
//        $serializer = $this->get('jms_serializer');
//        $data = $serializer->serialize($announce, 'json');

        $view = $this->view($comments);
        return $this->handleView($view);
    }

    public function postCommentsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApiBundle:User')->find($id);
        $comment = new UserComment();

        $comment->setUser($user);
        $comment->setBody("asdasdasdasdasd");
        $em->persist($comment);
        $em->flush();

        $view = $this->view(array("status" => "success"));
        return $this->handleView($view);
    }
}