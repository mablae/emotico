<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 30.10.16
 * Time: 00:17
 */

namespace Mittax\MessageBundle\Service\MessageProvider;


use Mittax\MessageBundle\Entity\Message;

interface IMessageProvider
{

    /**
     * @return string
     */
    public function send();

    /**
     * IMessageProvider constructor.
     * @param Message $message
     */
    public function __construct(Message $message);

    /**
     * @return Message
     */
    public function getMessage();
}