<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 26.10.16
 * Time: 23:59
 */

namespace Mittax\CoreBundle\Entity;


interface IEntity
{
    /**
     * @param \JMS\Serializer\Serializer $serializer
     * @return mixed
     */
    public function toJson(\JMS\Serializer\Serializer $serializer);

    /**
     * @param \JMS\Serializer\Serializer $serializer
     * @return mixed
     */
    public function toJsonResponse(\JMS\Serializer\Serializer $serializer);

    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);
}