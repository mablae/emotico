<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 26.10.16
 * Time: 23:55
 */

namespace EmoticoBundle\EmoticoBundle\Entity;

use AppBundle\Entity\User;
use EmoticoBundle\EmoticoBundle\IActions;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Serializer\Serializer;
use JMS\Serializer\SerializationContext;

class EntityAbstract
{
    /**
     * @param \JMS\Serializer\Serializer $serializer
     * @return mixed|string
     */
    public function toJson(\JMS\Serializer\Serializer $serializer)
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


}