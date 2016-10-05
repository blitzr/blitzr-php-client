<?php

use PHPUnit\Framework\TestCase;

use Blitzr\BlitzrClient;

use Blitzr\Exception\ConfigurationException;

class BlitzrClientTest extends TestCase
{

    public function testInitWithNullKey()
    {
        $this->expectException(ConfigurationException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('You must provide an API key.');
        new BlitzrClient(null);
    }
}
