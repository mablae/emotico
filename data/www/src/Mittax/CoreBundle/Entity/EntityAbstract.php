<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 26.10.16
 * Time: 23:55
 */

namespace Mittax\CoreBundle\Entity;

use Mittax\UserBundle\Entity\User;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use JMS\Serializer\SerializationContext;

class EntityAbstract implements IEntity
{
    /**
     * @param \JMS\Serializer\Serializer $serializer
     * @return mixed|string
     */
    public function toJson(\JMS\Serializer\Serializer $serializer)
    {
        return $this->_toJson($serializer);
    }

    /**
     * @param \JMS\Serializer\Serializer $serializer
     * @return JsonResponse
     */
    public function toJsonResponse(\JMS\Serializer\Serializer $serializer)
    {
        return new Response($this->_toJson($serializer));
    }

    /**
     * @param $serializer
     * @return mixed
     */
    private function _toJson($serializer)
    {
        $jsonContent = $serializer
            ->serialize(
                $this,
                'json',
                SerializationContext::create()
                    ->enableMaxDepthChecks()
            );

        return $jsonContent;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}