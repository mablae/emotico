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
        $response = $this->_client->request('POST', $this->_base_uri  . '/emotico/item',
            [
                'headers' => [
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json'],
                'body' => $this->_getSampleDataResponse()
            ]
        );

        $responseText = (string)$response->getBody();

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

        $resonseAsObject = \GuzzleHttp\json_decode($responseText);

        $this->assertEquals(400, $resonseAsObject->status);
    }
}