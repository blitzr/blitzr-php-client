<?php

namespace Blitzr;

use Blitzr\Exception;

class BlitzrClient
{
	private $apiKey;

	function __construct($apiKey)
	{
		if ($apiKey === null) {
			throw new BlitzrConfigurationException('1 est un paramètre invalide', 5);
		}
		$this->apiKey = $apiKey;
	}

	function test()
	{
		return $this->apiKey;
	}
}