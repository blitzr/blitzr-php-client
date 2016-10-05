<?php

use Blitzr\BlitzrClient;

use Blitzr\Exception\ConfigurationException;

class BlitzrClientTest extends \PHPUnit_Framework_TestCase
{

    const API_KEY = 'API_KEY';

    public function testInitWithNullKey()
    {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('You must provide an API key.');
        new BlitzrClient(null);
    }
}
