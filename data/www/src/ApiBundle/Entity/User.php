<?php

namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * User
 *
 * @ExclusionPolicy("all")
 */
class User extends BaseUser
{
    /**
     * @Expose
     * @var integer
     */
    protected $id;


    public function __construct()
    {
        $this->comments = new ArrayCollection();
        parent::__construct();
    }

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
     * 
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comment
     *
     * @param \ApiBundle\Entity\UserComment $comment
     *
     * @return User
     */
    public function addComment(\ApiBundle\Entity\UserComment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \ApiBundle\Entity\UserComment $comment
     */
    public function removeComment(\ApiBundle\Entity\UserComment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
