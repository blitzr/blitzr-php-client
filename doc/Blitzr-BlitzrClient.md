Blitzr\BlitzrClient
===============

BlitzrClient is the only client you need to access Blitzr API.

Just create an instance of BlitzrClient with your API key and
start enjoying Blitzr's Metadatas.


* Class name: BlitzrClient
* Namespace: Blitzr



Constants
----------


### API_BASE_URL

    const API_BASE_URL = 'https://api.blitzr.com/'





Properties
----------


### $apiKey

    private mixed $apiKey

Blitzr API Key

You can request an API Key and get all the documentation on developer.blitzr.com

* Visibility: **private**


### $client

    private mixed $client

Guzzle Client

BlitzrClient id powered by Guzzle : https://github.com/guzzle/guzzle

* Visibility: **private**


Methods
-------


### __construct

    null Blitzr\BlitzrClient::__construct(string $apiKey)

BlitzrClient constructor.

Use this constructor to set the API key to the new BlitzrClient and start your dev.

* Visibility: **public**


#### Arguments
* $apiKey **string** - &lt;p&gt;Blitzr API key&lt;/p&gt;



### request

    object|array|null Blitzr\BlitzrClient::request(string $method, array<mixed,mixed> $params)

Make a request to Blitzr API.

This method makes a request to Blitzr API on the method given in first parameter.
The second parameter is an associative array that represent the query params of the request.
The query param 'key' is automatically add by this method.

* Visibility: **public**


#### Arguments
* $method **string** - &lt;p&gt;Blitzr method to call (&lt;a href=&quot;https://api.blitzr.com/*method&quot;&gt;https://api.blitzr.com/*method&lt;/a&gt;*)&lt;/p&gt;
* $params **array&lt;mixed,mixed&gt;** - &lt;p&gt;Query parameters, this param is an associative array where
the key is the name of the corresponding query param and the value is the value of
the corresponding query param.&lt;/p&gt;



### getArtist

    object Blitzr\BlitzrClient::getArtist(string $slug, string $uuid, $extras, $extras_limit)

Get artist.

Get artist by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can get extra informations by setting the $extra parameter.
You can limit the extrs by the $extras_limit parameter.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $extras **mixed**
* $extras_limit **mixed**



### getArtistAliases

    array Blitzr\BlitzrClient::getArtistAliases(string $slug, string $uuid)

Get all artist's aliases.

Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;



### getArtistBands

    array Blitzr\BlitzrClient::getArtistBands(string $slug, string $uuid, integer $start, integer $limit)

Get artist's bands.

Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getArtistBiography

    object Blitzr\BlitzrClient::getArtistBiography(string $slug, string $uuid, string $lang, boolean $html_format, string $url_scheme)

Get artist's biography.

Get artist's biography by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can customize the response by the parameters $html_format and $url_scheme

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $lang **string** - &lt;p&gt;Language by country code (en|fr|...)&lt;/p&gt;
* $html_format **boolean** - &lt;p&gt;Retreive the biography with html markup&lt;/p&gt;
* $url_scheme **string** - &lt;p&gt;Customize the url scheme in the biography&lt;/p&gt;



### getArtistEvents

    array Blitzr\BlitzrClient::getArtistEvents(string $slug, string $uuid, integer $start, integer $limit)

Get artist's events.

Get the events of an artist. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getArtistMembers

    array Blitzr\BlitzrClient::getArtistMembers(string $slug, string $uuid, integer $start, integer $limit)

Get group's members.

Get the members of a group. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getArtistRelated

    array Blitzr\BlitzrClient::getArtistRelated(string $slug, string $uuid, integer $start, integer $limit)

Get related artists.

Get related artists to a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getArtistReleases

    array Blitzr\BlitzrClient::getArtistReleases(string $slug, string $uuid, integer $start, integer $limit, string $type, string $format, boolean $credited)

Get artist's releases.

Get related artists to a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.
You can filter by release type with the $type parameter.
You can filter by release format with the $format parameter.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;
* $type **string** - &lt;p&gt;Filter by release type (official|unofficial|all)&lt;/p&gt;
* $format **string** - &lt;p&gt;Filter by release format (album|single|live|all)&lt;/p&gt;
* $credited **boolean** - &lt;p&gt;Releases where artist is credited (not main releases)&lt;/p&gt;



### getArtistSimilars

    array Blitzr\BlitzrClient::getArtistSimilars(string $slug, string $uuid, integer $start, integer $limit)

Get artist's similar artists.

Get artist similars from a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getArtistSummary

    object Blitzr\BlitzrClient::getArtistSummary(string $slug, string $uuid)

Get an artist summary.

Get the artist summary. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;



### getArtistWebsites

    array Blitzr\BlitzrClient::getArtistWebsites(string $slug, string $uuid)

Get all artist's websites.

Get all the websites of an artist. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;



### getEvent

    object Blitzr\BlitzrClient::getEvent(string $slug, string $uuid)

Get an event.

Get an event by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the event&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the event&lt;/p&gt;



### getEvents

    array Blitzr\BlitzrClient::getEvents(string $country_code, float $latitude, float $longitude, object $date_start, $date_end, integer $radius, integer $start, integer $limit)

Get events.

Get events list.
Use $country_code to filter by country.
Use both dates params to filter by date.
Use $longitude, $latitude and $radius params to filter by geolocation.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $country_code **string** - &lt;p&gt;Country code where the event take place&lt;/p&gt;
* $latitude **float** - &lt;p&gt;Latitude of a point&lt;/p&gt;
* $longitude **float** - &lt;p&gt;Longitude of a point&lt;/p&gt;
* $date_start **object** - &lt;p&gt;DateTime object for when start the search&lt;/p&gt;
* $date_end **mixed**
* $radius **integer** - &lt;p&gt;Max distance in km from the lat,lon point&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getHarmoniaArtist

    object Blitzr\BlitzrClient::getHarmoniaArtist(string $service_name, string|integer $service_id)

Find an artist in the Harmonia.

Find an artist in the Harmonia.
Provide a service name and the artist's id for this service to retreive all the equivalence

* Visibility: **public**


#### Arguments
* $service_name **string** - &lt;p&gt;Name of the reference service&lt;/p&gt;
* $service_id **string|integer** - &lt;p&gt;Id of the artist in the reference service&lt;/p&gt;



### getHarmoniaRelease

    object Blitzr\BlitzrClient::getHarmoniaRelease(string $service_name, string|integer $service_id)

Find a release in the Harmonia.

Find an release in the Harmonia.
Provide a service name and the release's id for this service to retreive all the equivalence

* Visibility: **public**


#### Arguments
* $service_name **string** - &lt;p&gt;Name of the reference service&lt;/p&gt;
* $service_id **string|integer** - &lt;p&gt;Id of the release in the reference service&lt;/p&gt;



### getHarmoniaLabel

    object Blitzr\BlitzrClient::getHarmoniaLabel(string $service_name, string|integer $service_id)

Find a label in the Harmonia.

Find an label in the Harmonia.
Provide a service name and the label's id for this service to retreive all the equivalence

* Visibility: **public**


#### Arguments
* $service_name **string** - &lt;p&gt;Name of the reference service&lt;/p&gt;
* $service_id **string|integer** - &lt;p&gt;Id of the label in the reference service&lt;/p&gt;



### getHarmoniaSearchBySource

    array|object Blitzr\BlitzrClient::getHarmoniaSearchBySource(string $source_name, string|integer $source_id, array<mixed,string> $source_filters, boolean $strict)

Find a track in the Harmonia by the music source.

Find an track in the Harmonia by the music source.
Provide a source name and the source's id for this source to retreive track associated in the Harmonia.
The track is retreived with the artist and release informations.
By default all other sources for this track are also retreived. You can filter by service with $source_filters.
The $strict param allow Blitzr to guess what is the best result for you.

* Visibility: **public**


#### Arguments
* $source_name **string** - &lt;p&gt;Name of the reference source&lt;/p&gt;
* $source_id **string|integer** - &lt;p&gt;Id of the release in the reference source&lt;/p&gt;
* $source_filters **array&lt;mixed,string&gt;** - &lt;p&gt;Source filters : which sources do you want in response ?
One or many, separated by comma : youtube, soundcloud, bandcamp, deezer, spotify, rdio&lt;/p&gt;
* $strict **boolean** - &lt;p&gt;True if you want blitzr to guess the best result for you.
False if you want all matched results&lt;/p&gt;



### getLabel

    object Blitzr\BlitzrClient::getLabel(string $slug, string $uuid, $extras, $extras_limit)

Get label.

Get label by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can get extra informations by setting the $extra parameter.
You can limit the extrs by the $extras_limit parameter.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;
* $extras **mixed**
* $extras_limit **mixed**



### getLabelArtists

    array Blitzr\BlitzrClient::getLabelArtists(string $slug, string $uuid, integer $start, integer $limit)

Get label's artists.

Get the artists of a label. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getLabelBiography

    object Blitzr\BlitzrClient::getLabelBiography(string $slug, string $uuid, boolean $html_format, string $url_scheme)

Get label's biography.

Get label's biography by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can customize the response by the parameters $html_format and $url_scheme

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;
* $html_format **boolean** - &lt;p&gt;Retreive the biography with html markup&lt;/p&gt;
* $url_scheme **string** - &lt;p&gt;Customize the url scheme in the biography&lt;/p&gt;



### getLabelReleases

    array Blitzr\BlitzrClient::getLabelReleases(string $slug, string $uuid, string $format, integer $start, integer $limit)

Get label's releases.

Get the releases of a label.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;
* $format **string** - &lt;p&gt;Format of album (album|single|live|all)&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getLabelSimilars

    array Blitzr\BlitzrClient::getLabelSimilars(string $slug, string $uuid, integer $start, integer $limit)

Get label's similars.

Get the similars labels of a given label.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getLabelWebsites

    array Blitzr\BlitzrClient::getLabelWebsites(string $slug, string $uuid)

Get all label's websites.

Get all the websites of a label. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;



### getRelease

    object Blitzr\BlitzrClient::getRelease(string $slug, string $uuid)

Get a release.

Get a release by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the release&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the release&lt;/p&gt;



### getReleaseSources

    array Blitzr\BlitzrClient::getReleaseSources(string $slug, string $uuid)

Get all release's sources.

Get all release's sources. At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the release&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the release&lt;/p&gt;



### searchArtist

    object Blitzr\BlitzrClient::searchArtist(string $query, boolean $autocomplete, integer $start, integer $limit, $extras)

Search Artist.

Search artist.
Use $query parameter to search the artist.
The $autocomplete parameter allow you to find artist with predictive algorithm.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $query **string** - &lt;p&gt;Search query&lt;/p&gt;
* $autocomplete **boolean** - &lt;p&gt;Enable predictive search&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;
* $extras **mixed**



### searchLabel

    object Blitzr\BlitzrClient::searchLabel(string $query, boolean $autocomplete, integer $start, integer $limit, $extras)

Search Label.

Search label.
Use $query parameter to search the label.
The $autocomplete parameter allow you to find label with predictive algorithm.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $query **string** - &lt;p&gt;Search query&lt;/p&gt;
* $autocomplete **boolean** - &lt;p&gt;Enable predictive search&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;
* $extras **mixed**



### searchRelease

    object Blitzr\BlitzrClient::searchRelease(string $query, array<mixed,string> $filters, boolean $autocomplete, integer $start, integer $limit, $extras)

Search Release.

Search release.
Use $query parameter to search the release.
The $autocomplete parameter allow you to find release with predictive algorithm.
You can paginate by setting $start and $limit parameters.
You can also enable some filters by the param $filters

* Visibility: **public**


#### Arguments
* $query **string** - &lt;p&gt;Search query&lt;/p&gt;
* $filters **array&lt;mixed,string&gt;** - &lt;p&gt;Filter results. Available filters : artist, format_summary&lt;/p&gt;
* $autocomplete **boolean** - &lt;p&gt;Enable predictive search&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;
* $extras **mixed**



### searchTrack

    object Blitzr\BlitzrClient::searchTrack(string $query, array<mixed,string> $filters, boolean $autocomplete, integer $start, integer $limit, $extras)

Search Track.

Search track.
Use $query parameter to search the track.
The $autocomplete parameter allow you to find track with predictive algorithm.
You can paginate by setting $start and $limit parameters.
You can also enable some filters by the param $filters

* Visibility: **public**


#### Arguments
* $query **string** - &lt;p&gt;Search query&lt;/p&gt;
* $filters **array&lt;mixed,string&gt;** - &lt;p&gt;Filter results. Available filters : artist, release, format_summary&lt;/p&gt;
* $autocomplete **boolean** - &lt;p&gt;Enable predictive search&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;
* $extras **mixed**



### getShopArtist

    array Blitzr\BlitzrClient::getShopArtist(string $product_type, string $slug, string $uuid)

Get all shop items for an artist.

Get all shop items for an artist.
You must set the $product_type parameter. (cd|lp|mp3|merch)
At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $product_type **string** - &lt;p&gt;Type of shop product&lt;/p&gt;
* $slug **string** - &lt;p&gt;Blitzr slug of the artist&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the artist&lt;/p&gt;



### getShopLabel

    array Blitzr\BlitzrClient::getShopLabel(string $product_type, string $slug, string $uuid)

Get all shop items for a label.

Get all shop items for a label.
You must set the $product_type parameter. (cd|lp|merch)
At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $product_type **string** - &lt;p&gt;Type of shop product&lt;/p&gt;
* $slug **string** - &lt;p&gt;Blitzr slug of the label&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the label&lt;/p&gt;



### getShopRelease

    array Blitzr\BlitzrClient::getShopRelease(string $product_type, string $slug, string $uuid)

Get all shop items for a release.

Get all shop items for a release.
You must set the $product_type parameter. (cd|lp|mp3)
At least one of the $slug or $uuid parameters is mandatory.

* Visibility: **public**


#### Arguments
* $product_type **string** - &lt;p&gt;Type of shop product&lt;/p&gt;
* $slug **string** - &lt;p&gt;Blitzr slug of the release&lt;/p&gt;
* $uuid **string** - &lt;p&gt;Blitzr uuid of the release&lt;/p&gt;



### getShopTrack

    array Blitzr\BlitzrClient::getShopTrack(string $uuid)

Get all shop items for a track.

Get all shop items for a track.

* Visibility: **public**


#### Arguments
* $uuid **string** - &lt;p&gt;Blitzr uuid of the track&lt;/p&gt;



### getTag

    object Blitzr\BlitzrClient::getTag(string $slug)

Get a tag.

Get a tag by slug

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the tag&lt;/p&gt;



### getTagArtists

    array Blitzr\BlitzrClient::getTagArtists(string $slug, integer $start, integer $limit)

Get tags's artists.

Get the artists of a tag.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the tag&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getTagReleases

    array Blitzr\BlitzrClient::getTagReleases(string $slug, integer $start, integer $limit)

Get tags's releases.

Get the releases of a tag.
You can paginate by setting $start and $limit parameters.

* Visibility: **public**


#### Arguments
* $slug **string** - &lt;p&gt;Blitzr slug of the tag&lt;/p&gt;
* $start **integer** - &lt;p&gt;Start from this parameter value, for pagination&lt;/p&gt;
* $limit **integer** - &lt;p&gt;Limit the number of results, for pagination&lt;/p&gt;



### getTrack

    object Blitzr\BlitzrClient::getTrack(string $uuid)

Get a track.

Get a track by uuid

* Visibility: **public**


#### Arguments
* $uuid **string** - &lt;p&gt;Blitzr uuid of the track&lt;/p&gt;



### getTrackSources

    array Blitzr\BlitzrClient::getTrackSources(string $uuid)

Get all sources for a track.

Get all sources for a track.

* Visibility: **public**


#### Arguments
* $uuid **string** - &lt;p&gt;Blitzr uuid of the track&lt;/p&gt;


