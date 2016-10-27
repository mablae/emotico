<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 26.10.16
 * Time: 23:59
 */

namespace Mittax\EmoticoBundle\Entity;


interface IEntity
{
    public function toJson(\JMS\Serializer\Serializer $serializer);
}