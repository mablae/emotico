<?php

namespace Mittax\MessageBundle\Tests\Service;

use Mittax\CoreBundle\Tests\Controller\AbstractTest;
use Mittax\CoreBundle\Tests\Controller\IControllerTest;
use Mittax\MessageBundle\Entity\Message;
use Mittax\MessageBundle\Service\Manager;
use Nelmio\ApiDocBundle\Tests\Fixtures\Model\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Config\Definition\Exception\Exception;
use PHPUnit\Framework\TestCase;

require_once __DIR__. '/../../../../../app/autoload.php';

class ClientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $_bundle ='message';

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * test new Manager
     */
    public function testNewManager()
    {
        $this->assertInstanceOf(Manager::class, new Manager());
    }

    /**
     * test new message
     */
    public function testNewMessage()
    {
        $this->assertInstanceOf(Message::class, new Message());
    }

    /**
     * test gitting a list
     */
    public function testSetMessageOnManager()
    {
        $manager = new Manager();

        $manager = $manager->setMessage(new Message());

        $this->assertInstanceOf(Manager::class, $manager);
    }

    /**
     * test creating a new message
     */
    public function testGetMessageFromManager()
    {
        $manager = new Manager();

        $manager = $manager->setMessage(new Message());

        $message = $manager->getMessage();

        $this->assertInstanceOf(Message::class, $message);
    }

    /**
     * test getting twillo client from manager
     */
    public function _testGetClient()
    {
        $message = new Message();

        $message->setNamespace('Mittax\MessageBundle\Service\MessageProvider\Twillo');

        $manager = new Manager();

        $manager = $manager->setMessage($message);

        $client = $manager->getClient();

        $this->assertInstanceOf('Mittax\MessageBundle\Service\MessageProvider\Twillo\Client', $client);
    }
}