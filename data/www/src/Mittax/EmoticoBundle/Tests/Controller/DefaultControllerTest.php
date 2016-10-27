<?php

namespace Mittax\EmoticoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @var string
     */
    private $_sampelData ='"title":"a title","description"';

    /**
     * @var string
     */
    private $_base_uri='http://localhost:8089';

    /**
     * @var string
     */
    private $_sampleDataResponse;

    /**
     * @var \GuzzleHttp\Client
     */
    private $_client = null;

    public function setUp()
    {
        $this->_client = new Client();
    }

    /**
     * Test getting the sampledata
     */
    public function testSampleData()
    {
        $this->assertContains($this->_sampelData, $this->_getSampleDataResponse());
    }

    /**
     * @return string
     */
    private function _getSampleDataResponse()
    {
        $response = $this->_client->request('GET', $this->_base_uri . '/emotico/sample');

        $sampleDataResponse = (string)$response->getBody();

        return $sampleDataResponse;
    }

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testUnsupportedMediaTypeOnPost()
    {
        $response = $this->_client->request('POST', $this->_base_uri  . '/emotico/item', ['body' => $this->_getSampleDataResponse()]);

        $responseText = (string)$response->getBody();

        $this->expectExceptionMessage('415');
    }

    /**
     * test the post
     */
    public function testPost()
    {
        $responseText = $this->makeRequestWithSampleDataResponse();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        /**
         * Test if a last insert id is available in the response
         */
        $this->assertNotEmpty($responseAsObject->content->return->id);

        /**
         * Test if the response was successfull
         */
        $this->assertContains('success', $responseText);
    }

    /**
     * test if the validation is working
     */
    public function testPostWithValidationError()
    {
        $response = $this->_client->request('POST', $this->_base_uri  . '/emotico/item',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'],
                'body' => '{"title":"sds<d dsad"}'
            ]
        );

        $responseText = (string)$response->getBody();

        $this->assertContains('This value should not be blank', $responseText);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(400, $responseAsObject->status);
    }

    /**
     * test if the validation is working
     */
    public function testPut()
    {
        $responseText = $this->makeRequestWithSampleDataResponse('POST');

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        $responseText = $this->makeRequestWithSampleDataResponse('PUT',"/emotico/item/" . $id);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        /**
         * Test status
         */
        $this->assertEquals(200, $responseAsObject->status);

        /**
         * Test if the objectid from the request is the same as in the response
         */
        $this->assertEquals($id, $responseAsObject->content->return->id);
    }

    /**
     * Test if gettimg an item by id is successfull
     */
    public function testGetById()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST');

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * Test the get by id now
         */
        $response = $this->_client->request('GET', $this->_base_uri  . '/emotico/item/' . $id);

        $responseText = (string)$response->getBody();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(200,$responseAsObject->status);
    }

    /**
     * Test if getting an item by id will fail
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testFailGetById()
    {
        $response = $this->_client->request('GET', $this->_base_uri  . '/emotico/item/bullshit');

        $this->expectExceptionCode(404);
    }

    /**
     * @return string
     */
    private function makeRequestWithSampleDataResponse($verb = 'POST', $path = '/emotico/item')
    {
        $response = $this->_client->request($verb, $this->_base_uri  . $path,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'],
                'body' => $this->_getSampleDataResponse()
            ]
        );

        $responseText = (string)$response->getBody();

        return $responseText;
    }

    /**
     * test gitting a list
     */
    public function testGet()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST');

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * test gettimg a list
         */
        $response = $this->_client->request("GET", $this->_base_uri  . '/emotico/item');

        $responseText = (string)$response->getBody();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(200, $responseAsObject->status);

        $this->assertGreaterThan(0, count($responseAsObject->content));
    }

    public function testDelete()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST');

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * delete the last created id
         */
        $response = $this->_client->request("DELETE", $this->_base_uri  . '/emotico/item/' . $id);

        $responseText = (string)$response->getBody();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(200, $responseAsObject->status);

        $this->assertEquals('success', $responseAsObject->content->message);
    }

    /**
     * Test if deletion fails
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testDeleteFail()
    {
        $response = $this->_client->request("DELETE", $this->_base_uri  . '/emotico/item/fakeid');

        $this->expectExceptionCode(404);
    }
}