<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 30.10.16
 * Time: 10:43
 */

namespace Mittax\CoreBundle\Tests\Controller;

use Mittax\CoreBundle\Controller\AbstractController;
use Mittax\CoreBundle\Entity\IEntity;
use Mittax\CoreBundle\Tests\Controller\AbstractTest;
use Mittax\CoreBundle\Tests\Controller\IControllerTest;
use Mittax\MessageBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Config\Definition\Exception\Exception;
use PHPUnit\Framework\TestCase;

require_once __DIR__. '/../../../../../app/autoload.php';

class AbstractControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test if the controller is available
     */
    public function testInstance()
    {
        $abstractController = new AbstractController();

        $this->assertInstanceOf('Mittax\CoreBundle\Controller\AbstractController',$abstractController);
    }

    /**
     * Test if the controller is available
     */
    public function testInterfaceIsImplementedExists()
    {
        $reflectionClass = new \ReflectionClass(AbstractController::class);

        $implements = $reflectionClass->implementsInterface('Mittax\CoreBundle\Controller\IController');

        $this->assertTrue($implements);
    }
}