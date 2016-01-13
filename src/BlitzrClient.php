<?php

namespace Blitzr;

use GuzzleHttp\Client;
use Blitzr\Exception\ConfigurationException;

class BlitzrClient
{
	private $apiKey;
	private $client;

	function __construct($apiKey)
	{
		if ($apiKey === null) {
			throw new ConfigurationException('You must provide an API key.', 0);
		}
		$this->apiKey = $apiKey;
		$this->client = new Client();
	}

	public function test()
	{
		return $this->apiKey;
	}
}
