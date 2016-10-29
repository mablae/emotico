<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 29.10.16
 * Time: 18:24
 */

namespace Mittax\CoreBundle\Tests\Controller;


interface IControllerTest
{
    /**
     * Set the name of the current bundle
     *
     * @param string $bundle
     * @return mixed
     */
    public function setBundle(string $bundle);
}