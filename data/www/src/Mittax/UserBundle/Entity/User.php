<?php

namespace Mittax\UserBundle\Entity;

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
     * @param \Mittax\UserBundle\Entity\UserComment $comment
     * @return $this
     */
    public function addComment(\Mittax\UserBundle\Entity\UserComment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * @param \Mittax\UserBundle\Entity\UserComment $comment
     */
    public function removeComment(\Mittax\UserBundle\Entity\UserComment $comment)
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
