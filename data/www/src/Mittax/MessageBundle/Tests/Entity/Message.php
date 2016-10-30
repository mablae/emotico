<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 30.10.16
 * Time: 11:52
 */

namespace Mittax\MessageBundle\Tests\Entity;
use Mittax\MessageBundle\Entity\Message;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{

    /**
     * @return Message
     */
    public function testMessage()
    {
        $message = new Message();

        $this->assertInstanceOf(Message::class,$message);

        $message->setId(1);

        $this->assertGreaterThan(0, $message->getId());

        $this->assertEquals(1, $message->getId());

        $message->setNamespace('a namspace');

        $this->assertEquals('a namspace', $message->getNamespace());

        $message->setContent('some test content');

        $this->assertEquals('some test content', $message->getContent());

        $dateTimeMock = new \DateTime();

        $message->setDeletedAt($dateTimeMock);

        $this->assertEquals($dateTimeMock, $message->getDeletedAt());

        $message->setCreatedAt(new \DateTime());

        $this->assertEquals($dateTimeMock, $message->getCreatedAt());

        $message->setSender(1);

        $this->assertEquals(1, $message->getSender());

        $message->setStatus('sended');

        $this->assertEquals('sended', $message->getStatus());

        $message->setRecipients('a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}');

        $this->assertEquals('a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}', $message->getRecipients());
    }

    /**
     * Test if messages are implementing IEntity interface
     */
    public function testInterFaceIsImplemented()
    {
        $reflectionClass = new \ReflectionClass(new Message());

        $hasInterface = $reflectionClass->implementsInterface('Mittax\CoreBundle\Entity\IEntity');

        $this->assertTrue($hasInterface);
    }
}