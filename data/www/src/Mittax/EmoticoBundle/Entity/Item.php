<?php

namespace Mittax\EmoticoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Mittax\CoreBundle\Entity\EntityAbstract;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\MaxDepth; /* <=== Required */
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Accessor;
/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="Mittax\EmoticoBundle\Repository\ItemRepository")
 */

class Item extends EntityAbstract
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="iconpaths", type="array")
     */
    private $iconpaths;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="userid", type="integer")
     */
    private $userid;

    /**
     * @var int
     * @ORM\Column(name="groupid", type="integer", nullable=true)
     */
    private $groupid;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function setId($id)
    {
        return $this->id = $id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Item
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set iconpaths
     *
     * @param string $iconpaths
     *
     * @return Item
     */
    public function setIconpaths($iconpaths)
    {
        $this->iconpaths = $iconpaths;

        return $this;
    }

    /**
     * Get iconpaths
     *
     * @return string
     */
    public function getIconpaths()
    {
        return $this->iconpaths;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Item
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Item
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set groupid
     *
     * @param integer $groupid
     *
     * @return Item
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Get groupid
     *
     * @return int
     */
    public function getGroupid()
    {
        return $this->groupid;
    }
}

