<?php

namespace Mittax\MessageBundle\Tests\Controller;

use Mittax\CoreBundle\Tests\Controller\AbstractTest;
use Mittax\CoreBundle\Tests\Controller\IControllerTest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

require_once __DIR__. '/../../../../../app/autoload.php';

class DefaultControllerTest extends AbstractTest implements IControllerTest
{
    /**
     * @var string
     */
    protected $_sampelData ='{"subject":"a title","content":"a description","created_at"';

    /**
     * @var string
     */
    protected $_bundle ='message';


    public function setUp()
    {
        parent::setUp();

        $this->setBundle($this->_bundle);
    }

    /**
     * @param string $bundle
     * @return void
     */
    public function setBundle(string $bundle)
    {
        parent::setBundle($bundle);
    }

    /**
     * test gitting a list
     */
    public function testGet()
    {
        parent::testGet();
    }

    /**
     * Test Post with missing content type
     *
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testUnsupportedMediaTypeOnPost()
    {
        parent::testUnsupportedMediaTypeOnPost();
    }

    /**
     * test the post method to create new objects
     */
    public function testPost()
    {
        parent::testPost();
    }

    /**
     * test if the validation is working
     */
    public function testPostWithValidationError()
    {
       parent::testPostWithValidationError();
    }

    /**
     * test if the validation is working
     */
    public function testPut()
    {
       parent::testPut();
    }

    /**
     * Test if gettimg an item by id is successfull
     */
    public function testGetById()
    {
        parent::testGetById();
    }

    /**
     * Test if getting an item by id will fail
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testFailGetById()
    {
        parent::testFailGetById();
    }

    /**
     * Test if DELETE METHOD is working
     */
    public function testDelete()
    {
       parent::testDelete();
    }

    /**
     * Test if deletion fails
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testDeleteFail()
    {
        parent::testDeleteFail();
    }


    /**
     * Test if gettimg an item by id is successfull
     */
    public function testSend()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        $this->assertGreaterThan(0, $id);

        /**
         * Test send
         */
        $path = $this->_bundle .'/'.$id.'/send';

        $response = $this->_client->request('GET', $this->_base_uri  . '/' . $path);

        $responseText = (string)$response->getBody();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(200,$responseAsObject->status);
    }
}