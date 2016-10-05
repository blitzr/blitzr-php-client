<?php

use Blitzr\BlitzrClient;


class BlitzrClientTest extends \PHPUnit_Framework_TestCase
{

    const API_KEY = 'API_KEY';

    /**
     * @expectedException        Blitzr\Exception\ConfigurationException
     * @expectedExceptionCode 0
     * @expectedExceptionMessage You must provide an API key.
     */
    public function testInitWithNullKey()
    {
        new BlitzrClient(null);
    }
}
