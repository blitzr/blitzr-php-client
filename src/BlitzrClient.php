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
		$url = 'https://api.blitzr.com/artist/';
		$url = $url . "?slug=eminem";
		$url = $url . "&key=" . $this->apiKey;

		$res = $client->request('GET', $url, [
		    'headers' => [
		    	'Accept' => 'application/json'
		    ]
		]);

		echo $res->getStatusCode();
		echo $res->getHeaderLine('content-type');
		echo $res->getBody();
	}
}
