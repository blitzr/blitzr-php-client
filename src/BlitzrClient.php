<?php

/**
 * BlitzrClient file.
 */
namespace Blitzr;

use GuzzleHttp\Client;
use Blitzr\Exception\ConfigurationException;
use Blitzr\Exception\ClientException as BlitzrClientException;
use Blitzr\Exception\ServerException as BlitzrServerException;
use Blitzr\Exception\NetworkException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Exception\ServerException;

/**
 * BlitzrClient is the only client you need to access Blitzr API.
 *
 * Just create an instance of BlitzrClient with your API key and
 * start enjoying Blitzr's Metadatas.
 */
class BlitzrClient
{
    /**
     * Blitzr API Key.
     *
     * You can request an API Key and get all the documentation on developer.blitzr.com
     */
    private $apiKey;

    /**
     * Guzzle Client.
     *
     * BlitzrClient id powered by Guzzle : https://github.com/guzzle/guzzle
     */
    private $client;

    const API_BASE_URL = 'https://api.blitzr.com';

    /**
     * BlitzrClient constructor.
     *
     * Use this constructor to set the API key to the new BlitzrClient and start your dev.
     *
     * @param string $apiKey Blitzr API key
     */
    public function __construct($apiKey)
    {
        if ($apiKey === null) {
            throw new ConfigurationException('You must provide an API key.', 0);
        }
        $this->apiKey = $apiKey;
        $this->client = new Client(['base_uri' => self::API_BASE_URL]);
    }

    /**
     * Make a request to Blitzr API.
     *
     * This method makes a request to Blitzr API on the method given in first parameter.
     * The second parameter is an associative array that represent the query params of the request.
     * The query param 'key' is automatically add by this method.
     *
     * @param string  $method Blitzr method to call (https://api.blitzr.com/*method*)
     * @param mixed[] $params Query parameters, this param is an associative array where
     *                        the key is the name of the corresponding query param and the value is the value of
     *                        the corresponding query param
     *
     * @return object|array|null
     */
    protected function request($method, $params = [])
    {
        $params['key'] = $this->apiKey;

        try {
            $res = $this->client->request('GET', $method, [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => $params,
            ]);
        } catch (ClientException $e) {
            $err = json_decode($e->getResponse()->getBody()->getContents());
            throw new BlitzrClientException($err->message, $err->code);
        } catch (ConnectException $e) {
            $err = json_decode($e->getResponse()->getBody()->getContents());
            throw new NetworkException($err->message, $err->code);
        } catch (TransferException $e) {
            $err = json_decode($e->getResponse()->getBody()->getContents());
            throw new NetworkException($err->message, $err->code);
        } catch (ServerException $e) {
            $err = json_decode($e->getResponse()->getBody()->getContents());
            throw new BlitzrServerException($err->message, $err->code);
        }

        $json = $res->getBody()->getContents();

        return json_decode($json);
    }

    /***************************
    **       Artist API       **
    ***************************/

    /**
     * Get artist.
     *
     * Get artist by slug or uuid.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can get extra informations by setting the $extra parameter.
     * You can limit the extrs by the $extras_limit parameter.
     *
     * @param string $slug         Blitzr slug of the artist
     * @param string $uuid         Blitzr uuid of the artist
     * @param array  $extras       Artist extras : aliases, websites, relations
     *
     * @return object
     */
    public function getArtist($slug = null, $uuid = null, $extras = [])
    {
        return $this->request('/artist/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'extras' => implode(',', $extras)
        ]);
    }

    /**
     * Get all artist's aliases.
     *
     * Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the artist
     * @param string $uuid Blitzr uuid of the artist
     *
     * @return array
     */
    public function getArtistAliases($slug = null, $uuid = null)
    {
        return $this->request('/artist/aliases/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get artist's bands.
     *
     * Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getArtistBands($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->request('/artist/aliases/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get artist's biography.
     *
     * Get artist's biography by slug or uuid.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can customize the response by the parameters $html_format and $url_scheme
     *
     * @param string $slug        Blitzr slug of the artist
     * @param string $uuid        Blitzr uuid of the artist
     * @param string $lang        Language by country code (en|fr|...)
     * @param bool   $html_format Retrieve the biography with html markup
     * @param string $url_scheme  Customize the url scheme in the biography
     * @param string $license     License (cc0|cc-by-sa)
     * @param string $source     License (discogs|wikipedia)
     *
     * @return array
     */
    public function getArtistBiography($slug = null, $uuid = null, $lang = null, $html_format = false, $url_scheme = null, $source = null, $license = null)
    {
        return $this->request('/artist/biography/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'lang' => $lang,
            'license' => $license,
            'source' => $source,
            'format' => $html_format ? 'html' : null,
            'url_scheme' => $url_scheme,
        ]);
    }

    /**
     * Get artist's events.
     *
     * Get the events of an artist. At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getArtistEvents($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->request('/artist/events/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get artist's harmonia.
     *
     * Get the identifiers of this artist in other databases.
     *
     * @param string $slug Blitzr slug of the artist
     * @param string $uuid Blitzr uuid of the artist
     *
     * @return object
     */
    public function getArtistHarmonia($slug = null, $uuid = null)
    {
        return $this->request('/artist/harmonia/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get group's members.
     *
     * Get the members of a group. At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getArtistMembers($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->request('/artist/members/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get related artists.
     *
     * Get related artists to a given artist.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getArtistRelated($slug = null, $uuid = null, $start = null, $limit = null)
    {
        return $this->request('/artist/related/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get artist's releases.
     *
     * Get related artists to a given artist.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     * You can filter by release type with the $type parameter.
     * You can filter by release format with the $format parameter.
     *
     * @param string $slug     Blitzr slug of the artist
     * @param string $uuid     Blitzr uuid of the artist
     * @param int    $start    Start from this parameter value, for pagination
     * @param int    $limit    Limit the number of results, for pagination
     * @param string $type     Filter by release type (official|unofficial|all)
     * @param string $format   Filter by release format (album|single|live|all)
     * @param bool   $credited Releases where artist is credited (not main releases)
     *
     * @return array
     */
    public function getArtistReleases($slug = null, $uuid = null, $start = null, $limit = null, $type = null, $format = null, $credited = false)
    {
        return $this->request('/artist/releases/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
            'type' => $type,
            'format' => $format,
            'credited' => $credited ? 'true' : 'false',
        ]);
    }

    /**
     * Get artist's similar artists.
     *
     * Get artist similar from a given artist.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug    Blitzr slug of the artist
     * @param string $uuid    Blitzr uuid of the artist
     * @param array  $filters Filter results. Available filters : location
     * @param int    $start   Start from this parameter value, for pagination
     * @param int    $limit   Limit the number of results, for pagination
     *
     * @return array
     */
    public function getArtistSimilar($slug = null, $uuid = null, $filters = [], $start = null, $limit = null)
    {
        $params = [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/artist/similars/', $params);
    }

    /**
     * Get an artist summary.
     *
     * Get the artist summary. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the artist
     * @param string $uuid Blitzr uuid of the artist
     *
     * @return object
     */
    public function getArtistSummary($slug = null, $uuid = null)
    {
        return $this->request('/artist/summary/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all artist's websites.
     *
     * Get all the websites of an artist. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the artist
     * @param string $uuid Blitzr uuid of the artist
     *
     * @return array
     */
    public function getArtistWebsites($slug = null, $uuid = null)
    {
        return $this->request('/artist/websites/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /***************************
    **       Event API        **
    ***************************/

    /**
     * Get an event.
     *
     * Get an event by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the event
     * @param string $uuid Blitzr uuid of the event
     *
     * @return object
     */
    public function getEvent($slug = null, $uuid = null)
    {
        return $this->request('/event/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Search Event.
     *
     * Search Event.
     * Use $query parameter to search the Event.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string   $query   Search query
     * @param string[] $filters Filter results. Available filters : artist, country_code, city, venue, date_start, date_end, latitude, longitude, radius
     * @param int      $start   Start from this parameter value, for pagination
     * @param int      $limit   Limit the number of results, for pagination
     * @param bool extras Get extra info like number of results
     *
     * @return object
     */
    public function searchEvent($query = null, $filters = [], $start = null, $limit = null, $extras = false)
    {
        $params = [
            'query' => $query,
            'start' => $start,
            'limit' => $limit,
            'extras' => $extras ? 'true' : 'false',
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/search/event/', $params);
    }

    /***************************
    **      Harmonia API      **
    ***************************/

    /**
     * Find an artist in the Harmonia.
     *
     * Find an artist in the Harmonia.
     * Provide a service name and the artist's id for this service to retreive all the equivalence
     *
     * @param string     $service_name Name of the reference service
     * @param string|int $service_id   Id of the artist in the reference service
     *
     * @return object
     */
    public function getHarmoniaArtist($service_name = null, $service_id = null)
    {
        return $this->request('/harmonia/artist/', [
            'service_name' => $service_name,
            'service_id' => $service_id,
        ]);
    }

    /**
     * Find a release in the Harmonia.
     *
     * Find an release in the Harmonia.
     * Provide a service name and the release's id for this service to retreive all the equivalence
     *
     * @param string     $service_name Name of the reference service
     * @param string|int $service_id   Id of the release in the reference service
     *
     * @return object
     */
    public function getHarmoniaRelease($service_name = null, $service_id = null)
    {
        return $this->request('/harmonia/release/', [
            'service_name' => $service_name,
            'service_id' => $service_id,
        ]);
    }

    /**
     * Find a label in the Harmonia.
     *
     * Find an label in the Harmonia.
     * Provide a service name and the label's id for this service to retreive all the equivalence
     *
     * @param string     $service_name Name of the reference service
     * @param string|int $service_id   Id of the label in the reference service
     *
     * @return object
     */
    public function getHarmoniaLabel($service_name = null, $service_id = null)
    {
        return $this->request('/harmonia/label/', [
            'service_name' => $service_name,
            'service_id' => $service_id,
        ]);
    }

    /**
     * Find a track in the Harmonia by the music source.
     *
     * Find an track in the Harmonia by the music source.
     * Provide a source name and the source's id for this source to retreive track associated in the Harmonia.
     * The track is retreived with the artist and release informations.
     * By default all other sources for this track are also retreived. You can filter by service with $source_filters.
     * The $strict param allow Blitzr to guess what is the best result for you.
     *
     * @param string     $source_name    Name of the reference source
     * @param string|int $source_id      Id of the release in the reference source
     * @param string[]   $source_filters Source filters : which sources do you want in response ?
     *                                   One or many, separated by comma : youtube, soundcloud, bandcamp, deezer, spotify, rdio
     * @param bool       $strict         True if you want blitzr to guess the best result for you.
     *                                   False if you want all matched results
     *
     * @return array|object
     */
    public function getHarmoniaSearchBySource($source_name = null, $source_id = null, $source_filters = [], $strict = false)
    {
        return $this->request('/harmonia/searchbysource/', [
            'source_name' => $source_name,
            'source_id' => $source_id,
            'source_filters' => implode(',', $source_filters),
            'strict' => $strict ? 'true' : 'false',
        ]);
    }

    /***************************
    **        Label API       **
    ***************************/

    /**
     * Get label.
     *
     * Get label by slug or uuid.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can get extra informations by setting the $extra parameter.
     * You can limit the extrs by the $extras_limit parameter.
     *
     * @param string $slug         Blitzr slug of the label
     * @param string $uuid         Blitzr uuid of the label
     * @param array  $extras       Label extras : biography, websites, relations
     *
     * @return object
     */
    public function getLabel($slug = null, $uuid = null, $extras = [])
    {
        return $this->request('/label/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'extras' => implode(',', $extras)
        ]);
    }

    /**
     * Get label's artists.
     *
     * Get the artists of a label. At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the label
     * @param string $uuid  Blitzr uuid of the label
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     * @param string $order Order results by name or date of last release (must be 'name' or 'releaseDate'
     *                      default is date)
     *
     * @return array
     */
    public function getLabelArtists($slug = null, $uuid = null, $start = null, $limit = null, $order = null)
    {
        return $this->request('/label/artists/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
            'order' => $order,
        ]);
    }

    /**
     * Get label's biography.
     *
     * Get label's biography by slug or uuid.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can customize the response by the parameters $html_format and $url_scheme
     *
     * @param string $slug        Blitzr slug of the label
     * @param string $uuid        Blitzr uuid of the label
     * @param bool   $html_format Retreive the biography with html markup
     * @param string $url_scheme  Customize the url scheme in the biography
     *
     * @return object
     */
    public function getLabelBiography($slug = null, $uuid = null, $html_format = false, $url_scheme = null)
    {
        return $this->request('/label/biography/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'format' => $html_format ? 'html' : null,
            'url_scheme' => $url_scheme,
        ]);
    }

    /**
     * Get label's harmonia.
     *
     * Get the identifiers of this label in other databases.
     *
     * @param string $slug Blitzr slug of the label
     * @param string $uuid Blitzr uuid of the label
     *
     * @return object
     */
    public function getLabelHarmonia($slug = null, $uuid = null)
    {
        return $this->request('/label/harmonia/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get label's releases.
     *
     * Get the releases of a label.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug   Blitzr slug of the label
     * @param string $uuid   Blitzr uuid of the label
     * @param string $format Format of album (album|single|live|all)
     * @param int    $start  Start from this parameter value, for pagination
     * @param int    $limit  Limit the number of results, for pagination
     *
     * @return array
     */
    public function getLabelReleases($slug = null, $uuid = null, $format = null, $start = null, $limit = null)
    {
        return $this->request('/label/releases/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'format' => $format,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get label's similar.
     *
     * Get the similar labels of a given label.
     * At least one of the $slug or $uuid parameters is mandatory.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug    Blitzr slug of the label
     * @param string $uuid    Blitzr uuid of the label
     * @param array  $filters Filter results. Available filters : location
     * @param int    $start   Start from this parameter value, for pagination
     * @param int    $limit   Limit the number of results, for pagination
     *
     * @return array
     */
    public function getLabelSimilar($slug = null, $uuid = null, $filters = [], $start = null, $limit = null)
    {
        $params = [
            'slug' => $slug,
            'uuid' => $uuid,
            'start' => $start,
            'limit' => $limit,
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/label/similars/', $params);
    }

    /**
     * Get all label's websites.
     *
     * Get all the websites of a label. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the label
     * @param string $uuid Blitzr uuid of the label
     *
     * @return array
     */
    public function getLabelWebsites($slug = null, $uuid = null)
    {
        return $this->request('/label/websites/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /***************************
    **        Radio API       **
    ***************************/

    /**
     * Get an Artist's radio.
     *
     * Get a list of tracks from his last or famous releases. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getRadioArtist($slug = null, $uuid = null, $limit = null)
    {
        return $this->request('/radio/artist/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'limit' => $limit,
        ]);
    }

    /**
     * Get an Artist's similar radio.
     *
     * Get a list of tracks from the last or famous releases of the given artist similar. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug  Blitzr slug of the artist
     * @param string $uuid  Blitzr uuid of the artist
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getRadioArtistSimilar($slug = null, $uuid = null, $limit = null)
    {
        return $this->request('/radio/artist/similar/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'limit' => $limit,
        ]);
    }

    /**
     * Get an Event's radio.
     *
     * Get a list of tracks from the last or famous releases of the event's artists. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug  Blitzr slug of the event
     * @param string $uuid  Blitzr uuid of the event
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getRadioEvent($slug = null, $uuid = null, $limit = null)
    {
        return $this->request('/radio/event/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'limit' => $limit,
        ]);
    }

    /**
     * Get an Label's radio.
     *
     * Get a list of tracks from the last or famous releases of the label's artists. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug  Blitzr slug of the label
     * @param string $uuid  Blitzr uuid of the label
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getRadioLabel($slug = null, $uuid = null, $limit = null)
    {
        return $this->request('/radio/label/', [
            'slug' => $slug,
            'uuid' => $uuid,
            'limit' => $limit,
        ]);
    }

    /**
     * Get an Tag's radio.
     *
     * Get a list of tracks from the last or famous releases of the tag's artists. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug  Blitzr slug of the tag
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getRadioTag($slug = null, $limit = null)
    {
        return $this->request('/radio/tag/', [
            'slug' => $slug,
            'limit' => $limit,
        ]);
    }

    /***************************
    **       Release API      **
    ***************************/

    /**
     * Get a release.
     *
     * Get a release by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the release
     * @param string $uuid Blitzr uuid of the release
     *
     * @return object
     */
    public function getRelease($slug = null, $uuid = null)
    {
        return $this->request('/release/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all release's sources.
     *
     * Get all release's sources. At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $slug Blitzr slug of the release
     * @param string $uuid Blitzr uuid of the release
     *
     * @return array
     */
    public function getReleaseSources($slug = null, $uuid = null)
    {
        return $this->request('/release/sources/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /***************************
    **       Search API       **
    ***************************/

    /**
     * Search Artist.
     *
     * Search artist.
     * Use $query parameter to search the artist.
     * The $autocomplete parameter allow you to find artist with predictive algorithm.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string   $query        Search query
     * @param string[] $filters      Filter results. Available filters : location, tag, type
     * @param bool     $autocomplete Enable predictive search
     * @param int      $start        Start from this parameter value, for pagination
     * @param int      $limit        Limit the number of results, for pagination
     * @param bool extras Get extra info like number of results
     *
     * @return object
     */
    public function searchArtist($query = null, $filters = [], $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        $params = [
            'query' => $query,
            'autocomplete' => $autocomplete ? 'true' : 'false',
            'start' => $start,
            'limit' => $limit,
            'extras' => $extras ? 'true' : 'false',
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/search/artist/', $params);
    }

    /**
     * Search Label.
     *
     * Search label.
     * Use $query parameter to search the label.
     * The $autocomplete parameter allow you to find label with predictive algorithm.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string   $query        Search query
     * @param string[] $filters      Filter results. Available filters : location, tag
     * @param bool     $autocomplete Enable predictive search
     * @param int      $start        Start from this parameter value, for pagination
     * @param int      $limit        Limit the number of results, for pagination
     * @param bool extras Get extra info like number of results
     *
     * @return object
     */
    public function searchLabel($query = null, $filters = [], $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        $params = [
            'query' => $query,
            'autocomplete' => $autocomplete ? 'true' : 'false',
            'start' => $start,
            'limit' => $limit,
            'extras' => $extras ? 'true' : 'false',
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/search/label/', $params);
    }

    /**
     * Search Release.
     *
     * Search release.
     * Use $query parameter to search the release.
     * The $autocomplete parameter allow you to find release with predictive algorithm.
     * You can paginate by setting $start and $limit parameters.
     * You can also enable some filters by the param $filters
     *
     * @param string   $query        Search query
     * @param string[] $filters      Filter results. Available filters : artist, artist.uuid, tag, format_summary, year, location, label, label.uuid
     * @param bool     $autocomplete Enable predictive search
     * @param int      $start        Start from this parameter value, for pagination
     * @param int      $limit        Limit the number of results, for pagination
     * @param bool extras Get extra info like number of results
     *
     * @return object
     */
    public function searchRelease($query = null, $filters = [], $autocomplete = false, $start = null, $limit = null, $extras = false)
    {
        $params = [
            'query' => $query,
            'autocomplete' => $autocomplete ? 'true' : 'false',
            'start' => $start,
            'limit' => $limit,
            'extras' => $extras ? 'true' : 'false',
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/search/release/', $params);
    }

    /**
     * Search Track.
     *
     * Search track.
     * Use $query parameter to search the track.
     * The $autocomplete parameter allow you to find track with predictive algorithm.
     * You can paginate by setting $start and $limit parameters.
     * You can also enable some filters by the param $filters
     *
     * @param string   $query   Search query
     * @param string[] $filters Filter results. Available filters : artist, release, format_summary, year, location
     * @param int      $start   Start from this parameter value, for pagination
     * @param int      $limit   Limit the number of results, for pagination
     * @param bool extras Get extra info like number of results
     *
     * @return object
     */
    public function searchTrack($query = null, $filters = [], $start = null, $limit = null, $extras = false)
    {
        $params = [
            'query' => $query,
            'start' => $start,
            'limit' => $limit,
            'extras' => $extras ? 'true' : 'false',
        ];

        foreach ($filters as $key => $value) {
            $params['filters['.$key.']'] = $value;
        }

        return $this->request('/search/track/', $params);
    }

    /***************************
    **        Shop API        **
    ***************************/

    /**
     * Get all shop items for an artist.
     *
     * Get all shop items for an artist.
     * You must set the $product_type parameter. (cd|lp|mp3|merch)
     * At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $product_type Type of shop product
     * @param string $slug         Blitzr slug of the artist
     * @param string $uuid         Blitzr uuid of the artist
     *
     * @return array
     */
    public function getShopArtist($product_type = null, $slug = null, $uuid = null)
    {
        return $this->request('/buy/artist/'.$product_type.'/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all shop items for a label.
     *
     * Get all shop items for a label.
     * You must set the $product_type parameter. (cd|lp|merch)
     * At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $product_type Type of shop product
     * @param string $slug         Blitzr slug of the label
     * @param string $uuid         Blitzr uuid of the label
     *
     * @return array
     */
    public function getShopLabel($product_type = null, $slug = null, $uuid = null)
    {
        return $this->request('/buy/label/'.$product_type.'/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all shop items for a release.
     *
     * Get all shop items for a release.
     * You must set the $product_type parameter. (cd|lp|mp3)
     * At least one of the $slug or $uuid parameters is mandatory.
     *
     * @param string $product_type Type of shop product
     * @param string $slug         Blitzr slug of the release
     * @param string $uuid         Blitzr uuid of the release
     *
     * @return array
     */
    public function getShopRelease($product_type = null, $slug = null, $uuid = null)
    {
        return $this->request('/buy/release/'.$product_type.'/', [
            'slug' => $slug,
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all shop items for a track.
     *
     * Get all shop items for a track.
     *
     * @param string $uuid Blitzr uuid of the track
     *
     * @return array
     */
    public function getShopTrack($uuid = null)
    {
        return $this->request('/buy/track/', [
            'uuid' => $uuid,
        ]);
    }

    /***************************
    **        Tag API         **
    ***************************/

    /**
     * Get a tag.
     *
     * Get a tag by slug
     *
     * @param string $slug Blitzr slug of the tag
     *
     * @return object
     */
    public function getTag($slug = null)
    {
        return $this->request('/tag/', [
            'slug' => $slug,
        ]);
    }

    /**
     * Get tags's artists.
     *
     * Get the artists of a tag.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the tag
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getTagArtists($slug = null, $start = null, $limit = null)
    {
        return $this->request('/tag/artists/', [
            'slug' => $slug,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /**
     * Get tags's releases.
     *
     * Get the releases of a tag.
     * You can paginate by setting $start and $limit parameters.
     *
     * @param string $slug  Blitzr slug of the tag
     * @param int    $start Start from this parameter value, for pagination
     * @param int    $limit Limit the number of results, for pagination
     *
     * @return array
     */
    public function getTagReleases($slug = null, $start = null, $limit = null)
    {
        return $this->request('/tag/releases/', [
            'slug' => $slug,
            'start' => $start,
            'limit' => $limit,
        ]);
    }

    /***************************
    **       Track API        **
    ***************************/

    /**
     * Get a track.
     *
     * Get a track by uuid
     *
     * @param string $uuid Blitzr uuid of the track
     *
     * @return object
     */
    public function getTrack($uuid = null)
    {
        return $this->request('/track/', [
            'uuid' => $uuid,
        ]);
    }

    /**
     * Get all sources for a track.
     *
     * Get all sources for a track.
     *
     * @param string $uuid Blitzr uuid of the track
     *
     * @return array
     */
    public function getTrackSources($uuid = null)
    {
        return $this->request('/track/sources/', [
            'uuid' => $uuid,
        ]);
    }
}
