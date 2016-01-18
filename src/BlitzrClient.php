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
			    'query' => $params,
			    'debug' => true
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

	/***************************
	**       Global API       **
	***************************/

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

	/***************************
	**       Artist API       **
	***************************/

	public function getArtist($slug = null, $uuid = null, $extras = [], $extras_limit = 2)
	{
		return $this->request('artist/', [
			'slug' 		   	=> $slug,
			'uuid' 		   	=> $uuid,
			'extras'		=> implode(',', $extras),
			'extras_limit' 	=> $extras_limit
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
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistBiography($slug = null, $uuid = null, $lang = null, $html_format = false, $url_scheme = null)
	{
		return $this->request('artist/biography/', [
			'slug' 			=> $slug,
			'uuid' 			=> $uuid,
			'lang' 			=> $lang,
			'format' 		=> $html_format ? 'html' : null,
			'url_scheme' 	=> $url_scheme
		]);
	}

	public function getArtistEvents($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('artist/events/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistMembers($slug = null, $uuid = null, $start = 0, $limit = -1)
	{
		return $this->request('artist/members/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistRelated($slug = null, $uuid = null, $start = 0, $limit = -1)
	{
		return $this->request('artist/related/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getArtistReleases($slug = null, $uuid = null, $start = 0, $limit = 10, $type = null, $format = null, $credited = false)
	{
		return $this->request('artist/releases/', [
			'slug' 		=> $slug,
			'uuid' 		=> $uuid,
			'start' 	=> $start,
			'limit' 	=> $limit,
			'type' 		=> $type,
			'format' 	=> $format,
			'credited' 	=> $credited ? 'true' : 'false'
		]);
	}

	public function getArtistSimilars($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('artist/similars/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
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

	/***************************
	**       Event API        **
	***************************/

	public function getEvent($slug = null, $uuid = null)
	{
		return $this->request('event/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getEvents($country_code = null, $latitude = false, $longitude = false, $date_start = null, $date_end = null, $radius = -1, $start = 0, $limit = 10)
	{
		return $this->request('events/', [
			'country_code' 	=> $country_code,
			'latitude' 		=> $latitude ? $latitude : 'false',
			'longitude' 	=> $longitude ? $longitude : 'false',
			'date_start' 	=> $date_start ? $date_start->format(\DateTime::ISO8601) : null,
			'date_end' 		=> $date_end ? $date_end->format(\DateTime::ISO8601) : null,
			'raduis' 		=> $radius,
			'start' 		=> $start,
			'limit' 		=> $limit
		]);
	}

	/***************************
	**      Harmonia API      **
	***************************/

	public function getHarmoniaArtist($service_name = null, $service_id = null)
	{
		return $this->request('harmonia/artist/', [
			'service_name' 	=> $service_name,
			'service_id' 	=> $service_id
		]);
	}

	public function getHarmoniaRelease($service_name = null, $service_id = null)
	{
		return $this->request('harmonia/release/', [
			'service_name' 	=> $service_name,
			'service_id' 	=> $service_id
		]);
	}

	public function getHarmoniaLabel($service_name = null, $service_id = null)
	{
		return $this->request('harmonia/label/', [
			'service_name' 	=> $service_name,
			'service_id' 	=> $service_id
		]);
	}

	public function getHarmoniaSearchBySource($source_name = null, $source_id = null, $source_filters = [], $strict = false)
	{
		return $this->request('harmonia/searchbysource/', [
			'source_name' 		=> $source_name,
			'source_id' 		=> $source_id,
			'source_filters' 	=> implode(',', $source_filters),
			'strict' 			=> $strict ? 'true' : 'false'
		]);
	}

	/***************************
	**        Label API       **
	***************************/

	public function getLabel($slug = null, $uuid = null, $extras = [], $extras_limit = 2)
	{
		return $this->request('label/', [
			'slug' 		   	=> $slug,
			'uuid' 		   	=> $uuid,
			'extras'		=> implode(',', $extras),
			'extras_limit' 	=> $extras_limit
		]);
	}

	public function getLabelArtists($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('label/artists/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getLabelBiography($slug = null, $uuid = null, $lang = null, $html_format = false, $url_scheme = null)
	{
		return $this->request('label/biography/', [
			'slug' 			=> $slug,
			'uuid' 			=> $uuid,
			'format' 		=> $html_format ? 'html' : null,
			'url_scheme' 	=> $url_scheme
		]);
	}

	public function getLabelReleases($slug = null, $uuid = null, $format = null, $start = 0, $limit = 10)
	{
		return $this->request('label/releases/', [
			'slug' 		=> $slug,
			'uuid' 		=> $uuid,
			'format' 	=> $format,
			'start' 	=> $start,
			'limit' 	=> $limit
		]);
	}

	public function getLabelSimilars($slug = null, $uuid = null, $start = 0, $limit = 10)
	{
		return $this->request('label/similars/', [
			'slug' 	=> $slug,
			'uuid' 	=> $uuid,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getLabelWebsites($slug = null, $uuid = null)
	{
		return $this->request('label/websites/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	/***************************
	**       Release API      **
	***************************/

	public function getRelease($slug = null, $uuid = null)
	{
		return $this->request('release/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getReleaseSources($slug = null, $uuid = null)
	{
		return $this->request('release/sources/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	/***************************
	**       Search API       **
	***************************/

	public function searchArtist($query = null, $autocomplete = false, $start = 0, $limit = 10, $extras = false)
	{
		return $this->request('search/artist/', [
			'query' 		=> $query,
			'autocomplete' 	=> $autocomplete ? 'true' : 'false',
			'start' 		=> $start,
			'limit' 		=> $limit,
			'extras' 		=> $extras ? 'true' : 'false'
		]);
	}

	public function searchCity($query = null, $autocomplete = false, $latitude = null, $longitude = null, $start = 0, $limit = 10)
	{
		return $this->request('search/city/', [
			'query' 		=> $query,
			'autocomplete' 	=> $autocomplete ? 'true' : 'false',
			'latitude'		=> $latitude,
			'longitude'		=> $longitude,
			'start' 		=> $start,
			'limit' 		=> $limit
		]);
	}

	public function searchCountry($country_code = null, $start = 0, $limit = 10)
	{
		return $this->request('search/country/', [
			'country_code'	=> $country_code,
			'start' 		=> $start,
			'limit' 		=> $limit
		]);
	}

	public function searchLabel($query = null, $autocomplete = false, $start = 0, $limit = 10, $extras = false)
	{
		return $this->request('search/label/', [
			'query' 		=> $query,
			'autocomplete' 	=> $autocomplete ? 'true' : 'false',
			'start' 		=> $start,
			'limit' 		=> $limit,
			'extras' 		=> $extras ? 'true' : 'false'
		]);
	}

	public function searchRelease($query = null, $filters = [], $autocomplete = false, $start = 0, $limit = 10, $extras = false)
	{
		return $this->request('search/release/', [
			'query' 		=> $query,
			'filters'		=> implode(',', $filters),
			'autocomplete' 	=> $autocomplete ? 'true' : 'false',
			'start' 		=> $start,
			'limit' 		=> $limit,
			'extras' 		=> $extras ? 'true' : 'false'
		]);
	}

	public function searchTrack($query = null, $filters = [], $autocomplete = false, $start = 0, $limit = 10, $extras = false)
	{
		return $this->request('search/track/', [
			'query' 		=> $query,
			'filters'		=> implode(',', $filters),
			'autocomplete' 	=> $autocomplete ? 'true' : 'false',
			'start' 		=> $start,
			'limit' 		=> $limit,
			'extras' 		=> $extras ? 'true' : 'false'
		]);
	}

	/***************************
	**        Shop API        **
	***************************/

	public function getShopArtist($product_type = null, $slug = null, $uuid = null)
	{
		return $this->request('buy/artist/' . $product_type . '/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getShopLabel($product_type = null, $slug = null, $uuid = null)
	{
		return $this->request('buy/label/' . $product_type . '/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getShopRelease($product_type = null, $slug = null, $uuid = null)
	{
		return $this->request('buy/release/' . $product_type . '/', [
			'slug' => $slug,
			'uuid' => $uuid
		]);
	}

	public function getShopTrack($uuid = null)
	{
		return $this->request('buy/track/', [
			'uuid' => $uuid
		]);
	}

	/***************************
	**        Tag API         **
	***************************/

	public function getTag($slug = null)
	{
		return $this->request('tag/', [
			'slug' => $slug
		]);
	}

	public function getTagArtists($slug = null, $start = 0, $limit = 10)
	{
		return $this->request('tag/artists/', [
			'slug' 	=> $slug,
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getTagReleases($slug = null, $start = 0, $limit = 10)
	{
		return $this->request('tag/releases/', [
			'slug' 	=> $slug,
			'start' => $start,
			'limit' => $limit
		]);
	}

	/***************************
	**       Track API        **
	***************************/

	public function getTrack($uuid = null)
	{
		return $this->request('track/', [
			'uuid' => $uuid
		]);
	}

	public function getTrackCurrentlyListens($start = 0, $limit = 10)
	{
		return $this->request('track/currently_listened/', [
			'start' => $start,
			'limit' => $limit
		]);
	}

	public function getTrackSources($uuid = null)
	{
		return $this->request('track/sources/', [
			'uuid' => $uuid
		]);
	}

	/***************************
	**      Playlist API      **
	***************************/

	public function getPlaylist($id = null)
	{
		return $this->request('playlist/', [
			'id' => $id
		]);
	}
}
