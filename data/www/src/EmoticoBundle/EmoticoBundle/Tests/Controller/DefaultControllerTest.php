<?php

namespace EmoticoBundle\EmoticoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    private $_baseUrl = 'http://localhost:8089/emotico/api';

    public function setUp()
    {

    }

    public function testDefaultControllerGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', $this->_baseUrl);

        //$this->assertEquals(200, $client->getResponse()->getStatusCode());

        //$this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
