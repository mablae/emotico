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

    /**
     * @param Message $message
     * @return $this
     */
    public function setMessage(Message $message)
    {
        $this->_message = $message;
        
        return $this;
    }

    public function config()
    {
        //returns an instance of Vresh\TwilioBundle\Service\TwilioWrapper
        $twilio = $this->get('twilio.api');

        $message = $twilio->account->messages->sendMessage(
            '+14085551234', // From a Twilio number in your account
            '+12125551234', // Text any number
            "Hello monkey!"
        );

    }


    public function send()
    {
        // TODO: Implement send() method.
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
       return $this->_message;
    }


}