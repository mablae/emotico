<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 26.10.16
 * Time: 21:28
 */

namespace EmoticoBundle\EmoticoBundle\Repository\Emotico;

use AppBundle\Entity\User;

interface IActions
{
    public function attach(User $user);

    public function detach(User $user);

    public function toggle(User $user);
}