<?php

namespace ApiBundle\Entity;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * AuthCode
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \ApiBundle\Entity\Client
     */
    protected $client;

    /**
     * @var \ApiBundle\Entity\User
     */
    protected $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}
