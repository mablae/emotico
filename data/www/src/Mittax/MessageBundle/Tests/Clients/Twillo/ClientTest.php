<?php

namespace Mittax\MessageBundle\Tests\Clients\Twillo;

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


require_once __DIR__. '/../../../../../../app/autoload.php';

class ManagerTest extends \PHPUnit\Framework\TestCase
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
     * test if client has a send method
     */
    public function testGetClientHasASendMethod()
    {
        $message = new Message();

        $message->setNamespace('Mittax\MessageBundle\Service\MessageProvider\Twillo');

        $manager = new Manager();

        $manager = $manager->setMessage($message);

        $client = $manager->getClient();

        $this->assertTrue(method_exists($client, 'send'));
    }

    /**
     * @expectedException TypeError
     */
    public function testMissingConstructionParameter()
    {
       $client = new \Mittax\MessageBundle\Service\MessageProvider\Twillo\Client();
    }

    /**
     * Test getting method on the client
     */
    public function testGetMessage()
    {
        $client = new \Mittax\MessageBundle\Service\MessageProvider\Twillo\Client(new Message());

        $client->getMessage();
    }
}