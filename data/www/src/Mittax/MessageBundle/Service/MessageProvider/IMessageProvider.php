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
     * @return IMessageProvider
     */
    public function send();

    /**
     * Set message.
     * @param Message $message
     * @return IMessageProvider
     */
    public function setMessage(Message $message);

    /**
     * @return IMessageProvider
     */
    public function getMessage();
}