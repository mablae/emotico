<?php
/**
 * Created by PhpStorm.
 * User: jvolonda
 * Date: 5/25/16
 * Time: 12:09 PM
 */

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DemoController extends FOSRestController
{
    public function getDemosAction()
    {
        
        $data = array("hello" => "tg");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}