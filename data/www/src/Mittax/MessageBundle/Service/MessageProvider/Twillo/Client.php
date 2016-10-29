<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 29.10.16
 * Time: 22:59
 */

namespace Mittax\MessageBundle\Service\MessageProvider\Twillo;


use Mittax\MessageBundle\Entity\Message;
use Mittax\MessageBundle\Service\MessageProvider\IMessageProvider;

class Client implements IMessageProvider
{
    /**
     * @var Message
     */
    private $_message;

    public function __construct(Message $message)
    {
       $this->_message = $message;
    }

    public function send()
    {
        // TODO: Implement send() method.
    }


}