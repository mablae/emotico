<?php

namespace Mittax\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mittax\CoreBundle\Entity\EntityAbstract;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\MaxDepth; /* <=== Required */
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Accessor;

/**
 * MessageBox
 *
 * @ORM\Table(name="message_box")
 * @ORM\Entity(repositoryClass="Mittax\MessageBundle\Repository\MessageBoxRepository")
 */
class MessageBox extends EntityAbstract
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
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="messageid", type="integer")
     */
    private $messageid;

    /**
     * @var array
     * @Assert\NotBlank()
     * @ORM\Column(name="status", type="array")
     */
    private $status;

    /**
     * @var array
     * @Assert\NotBlank()
     * @ORM\Column(name="recipients", type="array")
     */
    private $recipients;

    /**
     * @var array
     * @Assert\NotBlank()
     * @ORM\Column(name="clients", type="array")
     */
    private $clients;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(name="sender", type="integer")
     */
    private $sender;


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
     * Set messageid
     *
     * @param integer $messageid
     *
     * @return MessageBox
     */
    public function setMessageid($messageid)
    {
        $this->messageid = $messageid;

        return $this;
    }

    /**
     * Get messageid
     *
     * @return int
     */
    public function getMessageid()
    {
        return $this->messageid;
    }

    /**
     * Set status
     *
     * @param array $status
     *
     * @return MessageBox
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set recipients
     *
     * @param array $recipients
     *
     * @return MessageBox
     */
    public function setRecipients($recipients)
    {
        $this->recipients = $recipients;

        return $this;
    }

    /**
     * Get recipients
     *
     * @return array
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * Set clients
     *
     * @param array $clients
     *
     * @return MessageBox
     */
    public function setClients($clients)
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * Get clients
     *
     * @return array
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set sender
     *
     * @param integer $sender
     *
     * @return MessageBox
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return int
     */
    public function getSender()
    {
        return $this->sender;
    }
}

