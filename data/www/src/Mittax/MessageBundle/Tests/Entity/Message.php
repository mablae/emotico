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

        $message->setContent('some test content');

        $this->assertEquals('some test content', $message->getContent());

        $message->setCreatedAt(new \DateTime());

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