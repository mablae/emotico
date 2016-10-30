<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 29.10.16
 * Time: 23:13
 */

namespace Mittax\MessageBundle\Service;


use Mittax\MessageBundle\Entity\Message;
use Mittax\MessageBundle\Service\MessageProvider\IMessageProvider;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Mittax\MessageBundle\Service\MessageProvider\Twillo\Client;

class Manager
{

    /**
     * @var Message
     */
    private $_message;

    /**
     * @param Message $message
     * @return $this
     */
    public function setMessage(\Mittax\MessageBundle\Entity\Message $message)
    {
        $this->_message = $message;

        return $this;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * Sends message
     *
     * @return JsonResponse
     */
    public function send()
    {

    }

    /**
     * @return IMessageProvider
     */
    public function getClient()
    {

    }
}