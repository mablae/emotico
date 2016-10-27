<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 27.10.16
 * Time: 13:19
 */

namespace Mittax\CoreBundle\Controller;


use Mittax\EmoticoBundle\Entity\IEntity;

interface IController
{
    /**
     * @param $entity
     * @return mixed
     */
    public function persistAndSave(IEntity $entity);

}