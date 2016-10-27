<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 27.10.16
 * Time: 13:19
 */

namespace Mittax\CoreBundle\Controller;

use Mittax\EmoticoBundle\Entity\IEntity;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface IController
{
    /**
     * @param IEntity $entity
     * @param ConstraintViolationListInterface|null $validationErrors
     * @return mixed
     */
    public function persistAndSave(IEntity $entity , ConstraintViolationListInterface $validationErrors = null);

    /**
     * @param IEntity $entity
     * @return mixed
     */
    public function deleteByItem(IEntity $entity);

    /**
     * @param $bundle
     * @return mixed
     */
    public function fetchAll($bundle);
}