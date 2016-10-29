<?php

namespace Mittax\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Config\Definition\Exception\Exception;

class AbstractTest extends WebTestCase
{
    /**
     * @var string
     */
    protected $_base_uri='http://localhost:8089';

    /**
     * @var string
     */
    protected $_bundle;
    /**
     * @var \GuzzleHttp\Client
     */
    protected $_client = null;

    /**
     * @param string $bundle
     */
    public function setBundle(string $bundle)
    {
        $this->_bundle = $bundle;
    }

    /**
     * Setup
     */
    public function setUp()
    {
        $this->_client = new Client();
    }

    /**
     * Test getting the sampledata
     */
    public function testGetSampleData()
    {
        $this->assertContains($this->_sampelData, $this->getSampleDataResponse());
    }

    /**
     * @return string
     */
    public function getSampleDataResponse()
    {
        $response = $this->_client->request('GET', $this->_base_uri . '/'.$this->_bundle.'/sample/test');

        $sampleDataResponse = (string)$response->getBody();

        return $sampleDataResponse;
    }


    /**
     * test gitting a list
     */
    public function testGet()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * test getting a list
         */
        $response = $this->_client->request("GET", $this->_base_uri  . '/' . $this->_bundle);

        $responseText = (string)$response->getBody();

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(200, $responseAsObject->status);

        $this->assertGreaterThan(0, count($responseAsObject->content));
    }

    /**
     * Test Post with missing content type
     *
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testUnsupportedMediaTypeOnPost()
    {
        $this->_client->request('POST', $this->_base_uri  . '/' . $this->_bundle, ['body' => $this->getSampleDataResponse()]);

        $this->expectExceptionMessage('415');
    }

    /**
     * test the post method to create new objects
     */
    public function testPost()
    {
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        /**
         * Test if a last insert id is available in the response, so the database insert was successful
         */
        $this->assertNotEmpty($responseAsObject->content->return->id);

        /**
         * Test if the request was successfull
         */
        $this->assertContains('success', $responseText);
    }

    /**
     * test if the validation is working
     */
    public function testPostWithValidationError()
    {
        $path = $this->_base_uri  . '/' . $this->_bundle;

        $data = '{"title":"sds<d dsad"}';

        $response = $this->_client->request('POST', $path,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'],
                'body' => $data
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
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        $path = $this->_bundle . '/' . $id;

        $responseText = $this->makeRequestWithSampleDataResponse('PUT', $path);

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
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * Test the get by id now
         */
        $response = $this->_client->request('GET', $this->_base_uri  . '/' . $this->_bundle . '/' . $id);

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
        $this->_client->request('GET', $this->_base_uri  . '/' . $this->_bundle .'/bullshit');

        $this->expectExceptionCode(404);
    }

    /**
     * @return string
     */
    public function makeRequestWithSampleDataResponse($verb = 'POST', $path)
    {
        $path = $this->_base_uri  . '/' . $path;

        $header = [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'],
                    'body' => $this->getSampleDataResponse()
                  ];

        $response = $this->_client->request($verb, $path, $header);

        $responseText = (string)$response->getBody();

        return $responseText;
    }


    /**
     * Test if DELETE METHOD is working
     */
    public function testDelete()
    {
        /**
         * create an id by post a new item
         */
        $responseText = $this->makeRequestWithSampleDataResponse('POST', $this->_bundle);

        $responseAsObject = \GuzzleHttp\json_decode($responseText);

        $id = $responseAsObject->content->return->id;

        /**
         * delete the last created id
         */

        $path = $this->_base_uri  . '/' . $this->_bundle .'/' . $id;

        $response = $this->_client->request("DELETE", $path);

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
        $this->_client->request("DELETE", $this->_base_uri  . '/' . $this->_bundle .'/fakeid');

        $this->expectExceptionCode(404);
    }
}