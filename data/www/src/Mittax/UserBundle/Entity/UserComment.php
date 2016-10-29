<?php

namespace Mittax\UserBundle\Entity;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
/**
 * @ExclusionPolicy("all")
 * UserComment
 */
class UserComment
{
    /**
     * @Expose
     * @var integer
     */
    private $id;

    /**
     *@Expose
     * @var \Mittax\UserBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Mittax\UserBundle\Entity\User $user
     *
     * @return UserComment
     */
    public function setUser(\Mittax\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Mittax\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @Expose
     * @var string
     */
    private $body;


    /**
     * Set body
     *
     * @param string $body
     *
     * @return UserComment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}
