<?php

namespace Blitzr;

use GuzzleHttp\Client;
use Blitzr\Exception\ConfigurationException;
use Blitzr\Exception\MandatoryParamsException;
use Blitzr\Exception\BlitzrException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Exception\ServerException;

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
		$this->client = new Client(['base_uri' => 'https://api.blitzr.com/']);
	}

	public function request($method, $params = [])
	{
		$params["key"] = $this->apiKey;

		try {
			$res = $this->client->request('GET', $method, [
			    'headers' => [
			    	'Accept' => 'application/json'
			    ],
			    'query' => $params
			]);
		} catch (ClientException $e) {
			$err = json_decode($e->getResponse()->getBody()->getContents());
			throw new MandatoryParamsException($err->message, $err->code);
		} catch (ConnectException $e) {
			$err = json_decode($e->getResponse()->getBody()->getContents());
			throw new BlitzrException($err->message, $err->code);
		} catch (TransferException $e) {
			$err = json_decode($e->getResponse()->getBody()->getContents());
			throw new BlitzrException($err->message, $err->code);
		} catch (ServerException $e) {
			$err = json_decode($e->getResponse()->getBody()->getContents());
			throw new BlitzrException($err->message, $err->code);
		}

		$json = $res->getBody()->getContents();

		return json_decode($json);
	}

	public function getTopArtists($start = 0, $limit = 10)
	{
		return $this->request('top/artists/', [
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getTopListens($start = 0, $limit = 10)
	{
		return $this->request('top/listens/', [
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtist($slug = null, $uuid = null, $extras = [], $extras_limit = 2)
	{
		return $this->request('artist/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'extras' => implode(',', $extras),
			'extras_limit' => $extras_limit
		]);
	}

	public function getArtistAliases($slug = null, $uuid = null)
	{
		return $this->request('artist/aliases/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getArtistBands($slug = null, $uuid = null, $start = 0, $limit = -1)
	{
		return $this->request('artist/aliases/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistBiography($slug = null, $uuid = null, $lang = null, $html_format = false, $url_scheme = null)
	{
		return $this->request('artist/biography/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'lang' => $lang,
			'format' => $html_format ? 'html' : null,
			'url_scheme' => $url_scheme
		]);
	}

	public function getArtistEvents($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('artist/events/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistMembers($slug = null, $uuid = null, $start = 0, $limit = -1)
	{
		return $this->request('artist/members/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistRelated($slug = null, $uuid = null, $start = 0, $limit = -1)
	{
		return $this->request('artist/related/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistReleases($slug = null, $uuid = null, $start = 0, $limit = 10, $type = null, $format = null, $credited = false)
	{
		return $this->request('artist/releases/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit,
			'type' => $type,
			'format' => $format,
			'credited' => $credited
		]);
	}

	public function getArtistSimilars($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('artist/similars/', [
			'slug' => $slug,
			'uuid' => $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistSummary($slug = null, $uuid = null)
	{
		return $this->request('artist/summary/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getArtistWebsites($slug = null, $uuid = null)
	{
		return $this->request('artist/websites/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}
}
