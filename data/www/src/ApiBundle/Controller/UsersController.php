<?php
/**
 * Created by PhpStorm.
 * User: jvolonda
 * Date: 5/25/16
 * Time: 12:09 PM
 */

namespace ApiBundle\Controller;

use ApiBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends FOSRestController
{
    /**
     * @ApiDoc(
     *     section="User"
     * )
     *
     */
    public function getUsersAction()
    {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException(); // check auth with token
        }

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('ApiBundle:User')->findAll();
//        $serializer = $this->get('jms_serializer');
//        $data = $serializer->serialize($users, 'json');

        $response = array("error" => false, "users" => $users);
        $view = $this->view($response);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(
     *  description="List info of one User",
     *  section = "User",
     *  statusCodes={
     *     200="Returned when successful",
     *     403="Returned when the user is not authorized to say hello"
     *  },
     * )
     *  @param int $id the id of the user you need
     *  @return array
     */
    public function getUserAction($id)
    {

        //$user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApiBundle:User')->find($id);

        $view = $this->view(array("user" => $user));
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(
     *  description="Add user to db",
     *  section = "User",
     *  statusCodes={
     *     200="Returned when successful",
     *     400="User already exist"
     *  },
     * )
     */
    public function postUserAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new \FOS\UserBundle\Event\GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(\FOS\UserBundle\FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $event = new \FOS\UserBundle\Event\FormEvent($form, $request);
            $dispatcher->dispatch(\FOS\UserBundle\FOSUserEvents::REGISTRATION_SUCCESS, $event);

            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('fos_user_registration_confirmed');
                $response = new \Symfony\Component\HttpFoundation\RedirectResponse($url);
            }

            $dispatcher->dispatch(\FOS\UserBundle\FOSUserEvents::REGISTRATION_COMPLETED, new \FOS\UserBundle\Event\FilterUserResponseEvent($user, $request, $response));

            $view = $this->view(array('status' => "account created"));

            return $this->handleView($view);
        }

        $view = $this->view($form);
        return $this->handleView($view);
    }
}