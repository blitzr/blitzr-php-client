<?php

namespace Blitzr;

use Blitzr\Exception;

class BlitzrClient
{
	private $apiKey;
	private $client;

	function __construct($apiKey)
	{
		if ($apiKey === null) {
			throw new BlitzrConfigurationException('1 est un paramètre invalide', 5);
		}
		$this->apiKey = $apiKey;
		$this->client = new GuzzleHttp\Client();
	}

	function test()
	{
		return $this->apiKey;
	}
}