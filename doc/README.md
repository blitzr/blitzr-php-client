# Blitzr PHP client Documentation

## Table of Contents

* [BlitzrClient](#blitzrclient)
    * [__construct](#__construct)
    * [request](#request)
    * [getArtist](#getartist)
    * [getArtistAliases](#getartistaliases)
    * [getArtistBands](#getartistbands)
    * [getArtistBiography](#getartistbiography)
    * [getArtistEvents](#getartistevents)
    * [getArtistMembers](#getartistmembers)
    * [getArtistRelated](#getartistrelated)
    * [getArtistReleases](#getartistreleases)
    * [getArtistSimilars](#getartistsimilars)
    * [getArtistSummary](#getartistsummary)
    * [getArtistWebsites](#getartistwebsites)
    * [getEvent](#getevent)
    * [getEvents](#getevents)
    * [getHarmoniaArtist](#getharmoniaartist)
    * [getHarmoniaRelease](#getharmoniarelease)
    * [getHarmoniaLabel](#getharmonialabel)
    * [getHarmoniaSearchBySource](#getharmoniasearchbysource)
    * [getLabel](#getlabel)
    * [getLabelArtists](#getlabelartists)
    * [getLabelBiography](#getlabelbiography)
    * [getLabelReleases](#getlabelreleases)
    * [getLabelSimilars](#getlabelsimilars)
    * [getLabelWebsites](#getlabelwebsites)
    * [getRelease](#getrelease)
    * [getReleaseSources](#getreleasesources)
    * [searchArtist](#searchartist)
    * [searchLabel](#searchlabel)
    * [searchRelease](#searchrelease)
    * [searchTrack](#searchtrack)
    * [getShopArtist](#getshopartist)
    * [getShopLabel](#getshoplabel)
    * [getShopRelease](#getshoprelease)
    * [getShopTrack](#getshoptrack)
    * [getTag](#gettag)
    * [getTagArtists](#gettagartists)
    * [getTagReleases](#gettagreleases)
    * [getTrack](#gettrack)
    * [getTrackSources](#gettracksources)
* [ClientException](#clientexception)
    * [__construct](#__construct-1)
    * [__toString](#__tostring)
* [ConfigurationException](#configurationexception)
    * [__construct](#__construct-2)
    * [__toString](#__tostring-1)
* [NetworkException](#networkexception)
    * [__construct](#__construct-3)
    * [__toString](#__tostring-2)
* [ServerException](#serverexception)
    * [__construct](#__construct-4)
    * [__toString](#__tostring-3)

## BlitzrClient

BlitzrClient is the only client you need to access Blitzr API.

Just create an instance of BlitzrClient with your API key and
start enjoying Blitzr's Metadatas.

* Full name: \Blitzr\BlitzrClient



### __construct

BlitzrClient constructor.

```php
BlitzrClient::__construct( string $apiKey ): null
```

Use this constructor to set the API key to the new BlitzrClient and start your dev.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$apiKey` | **string** | Blitzr API key |




---


### request

Make a request to Blitzr API.

```php
BlitzrClient::request( string $method, array&lt;mixed,mixed&gt; $params = array() ): object|array|null
```

This method makes a request to Blitzr API on the method given in first parameter.
The second parameter is an associative array that represent the query params of the request.
The query param 'key' is automatically add by this method.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$method` | **string** | Blitzr method to call (https://api.blitzr.com/*method*) |
| `$params` | **array<mixed,mixed>** | Query parameters, this param is an associative array where
the key is the name of the corresponding query param and the value is the value of
the corresponding query param. |




---


### getArtist

Get artist.

```php
BlitzrClient::getArtist( string $slug = null, string $uuid = null,  $extras = array(),  $extras_limit = null ): object
```

Get artist by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can get extra informations by setting the $extra parameter.
You can limit the extrs by the $extras_limit parameter.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$extras` | **** |  |
| `$extras_limit` | **** |  |




---


### getArtistAliases

Get all artist's aliases.

```php
BlitzrClient::getArtistAliases( string $slug = null, string $uuid = null ): array
```

Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |




---


### getArtistBands

Get artist's bands.

```php
BlitzrClient::getArtistBands( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get all the aliases of an artist. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getArtistBiography

Get artist's biography.

```php
BlitzrClient::getArtistBiography( string $slug = null, string $uuid = null, string $lang = null, boolean $html_format = false, string $url_scheme = null ): object
```

Get artist's biography by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can customize the response by the parameters $html_format and $url_scheme


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$lang` | **string** | Language by country code (en&#124;fr&#124;...) |
| `$html_format` | **boolean** | Retreive the biography with html markup |
| `$url_scheme` | **string** | Customize the url scheme in the biography |




---


### getArtistEvents

Get artist's events.

```php
BlitzrClient::getArtistEvents( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get the events of an artist. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getArtistMembers

Get group's members.

```php
BlitzrClient::getArtistMembers( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get the members of a group. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getArtistRelated

Get related artists.

```php
BlitzrClient::getArtistRelated( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get related artists to a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getArtistReleases

Get artist's releases.

```php
BlitzrClient::getArtistReleases( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null, string $type = null, string $format = null, boolean $credited = false ): array
```

Get related artists to a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.
You can filter by release type with the $type parameter.
You can filter by release format with the $format parameter.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |
| `$type` | **string** | Filter by release type (official&#124;unofficial&#124;all) |
| `$format` | **string** | Filter by release format (album&#124;single&#124;live&#124;all) |
| `$credited` | **boolean** | Releases where artist is credited (not main releases) |




---


### getArtistSimilars

Get artist's similar artists.

```php
BlitzrClient::getArtistSimilars( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get artist similars from a given artist.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getArtistSummary

Get an artist summary.

```php
BlitzrClient::getArtistSummary( string $slug = null, string $uuid = null ): object
```

Get the artist summary. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |




---


### getArtistWebsites

Get all artist's websites.

```php
BlitzrClient::getArtistWebsites( string $slug = null, string $uuid = null ): array
```

Get all the websites of an artist. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |




---


### getEvent

Get an event.

```php
BlitzrClient::getEvent( string $slug = null, string $uuid = null ): object
```

Get an event by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the event |
| `$uuid` | **string** | Blitzr uuid of the event |




---


### getEvents

Get events.

```php
BlitzrClient::getEvents( string $country_code = null, float $latitude = false, float $longitude = false, object $date_start = null,  $date_end = null, integer $radius = null, integer $start = null, integer $limit = null ): array
```

Get events list.
Use $country_code to filter by country.
Use both dates params to filter by date.
Use $longitude, $latitude and $radius params to filter by geolocation.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$country_code` | **string** | Country code where the event take place |
| `$latitude` | **float** | Latitude of a point |
| `$longitude` | **float** | Longitude of a point |
| `$date_start` | **object** | DateTime object for when end the search |
| `$date_end` | **** |  |
| `$radius` | **integer** | Max distance in km from the lat,lon point |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getHarmoniaArtist

Find an artist in the Harmonia.

```php
BlitzrClient::getHarmoniaArtist( string $service_name = null, string|integer $service_id = null ): object
```

Find an artist in the Harmonia.
Provide a service name and the artist's id for this service to retreive all the equivalence


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$service_name` | **string** | Name of the reference service |
| `$service_id` | **string&#124;integer** | Id of the artist in the reference service |




---


### getHarmoniaRelease

Find a release in the Harmonia.

```php
BlitzrClient::getHarmoniaRelease( string $service_name = null, string|integer $service_id = null ): object
```

Find an release in the Harmonia.
Provide a service name and the release's id for this service to retreive all the equivalence


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$service_name` | **string** | Name of the reference service |
| `$service_id` | **string&#124;integer** | Id of the release in the reference service |




---


### getHarmoniaLabel

Find a label in the Harmonia.

```php
BlitzrClient::getHarmoniaLabel( string $service_name = null, string|integer $service_id = null ): object
```

Find an label in the Harmonia.
Provide a service name and the label's id for this service to retreive all the equivalence


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$service_name` | **string** | Name of the reference service |
| `$service_id` | **string&#124;integer** | Id of the label in the reference service |




---


### getHarmoniaSearchBySource

Find a track in the Harmonia by the music source.

```php
BlitzrClient::getHarmoniaSearchBySource( string $source_name = null, string|integer $source_id = null, array&lt;mixed,string&gt; $source_filters = array(), boolean $strict = false ): array|object
```

Find an track in the Harmonia by the music source.
Provide a source name and the source's id for this source to retreive track associated in the Harmonia.
The track is retreived with the artist and release informations.
By default all other sources for this track are also retreived. You can filter by service with $source_filters.
The $strict param allow Blitzr to guess what is the best result for you.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$source_name` | **string** | Name of the reference source |
| `$source_id` | **string&#124;integer** | Id of the release in the reference source |
| `$source_filters` | **array<mixed,string>** | Source filters : which sources do you want in response ?
One or many, separated by comma : youtube, soundcloud, bandcamp, deezer, spotify, rdio |
| `$strict` | **boolean** | True if you want blitzr to guess the best result for you.
False if you want all matched results |




---


### getLabel

Get label.

```php
BlitzrClient::getLabel( string $slug = null, string $uuid = null,  $extras = array(),  $extras_limit = null ): object
```

Get label by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can get extra informations by setting the $extra parameter.
You can limit the extrs by the $extras_limit parameter.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |
| `$extras` | **** |  |
| `$extras_limit` | **** |  |




---


### getLabelArtists

Get label's artists.

```php
BlitzrClient::getLabelArtists( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get the artists of a label. At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getLabelBiography

Get label's biography.

```php
BlitzrClient::getLabelBiography( string $slug = null, string $uuid = null, boolean $html_format = false, string $url_scheme = null ): object
```

Get label's biography by slug or uuid.
At least one of the $slug or $uuid parameters is mandatory.
You can customize the response by the parameters $html_format and $url_scheme


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |
| `$html_format` | **boolean** | Retreive the biography with html markup |
| `$url_scheme` | **string** | Customize the url scheme in the biography |




---


### getLabelReleases

Get label's releases.

```php
BlitzrClient::getLabelReleases( string $slug = null, string $uuid = null, string $format = null, integer $start = null, integer $limit = null ): array
```

Get the releases of a label.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |
| `$format` | **string** | Format of album (album&#124;single&#124;live&#124;all) |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getLabelSimilars

Get label's similars.

```php
BlitzrClient::getLabelSimilars( string $slug = null, string $uuid = null, integer $start = null, integer $limit = null ): array
```

Get the similars labels of a given label.
At least one of the $slug or $uuid parameters is mandatory.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getLabelWebsites

Get all label's websites.

```php
BlitzrClient::getLabelWebsites( string $slug = null, string $uuid = null ): array
```

Get all the websites of a label. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |




---


### getRelease

Get a release.

```php
BlitzrClient::getRelease( string $slug = null, string $uuid = null ): object
```

Get a release by slug or uuid. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the release |
| `$uuid` | **string** | Blitzr uuid of the release |




---


### getReleaseSources

Get all release's sources.

```php
BlitzrClient::getReleaseSources( string $slug = null, string $uuid = null ): array
```

Get all release's sources. At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the release |
| `$uuid` | **string** | Blitzr uuid of the release |




---


### searchArtist

Search Artist.

```php
BlitzrClient::searchArtist( string $query = null, boolean $autocomplete = false, integer $start = null, integer $limit = null,  $extras = false ): object
```

Search artist.
Use $query parameter to search the artist.
The $autocomplete parameter allow you to find artist with predictive algorithm.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$query` | **string** | Search query |
| `$autocomplete` | **boolean** | Enable predictive search |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |
| `$extras` | **** |  |




---


### searchLabel

Search Label.

```php
BlitzrClient::searchLabel( string $query = null, boolean $autocomplete = false, integer $start = null, integer $limit = null,  $extras = false ): object
```

Search label.
Use $query parameter to search the label.
The $autocomplete parameter allow you to find label with predictive algorithm.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$query` | **string** | Search query |
| `$autocomplete` | **boolean** | Enable predictive search |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |
| `$extras` | **** |  |




---


### searchRelease

Search Release.

```php
BlitzrClient::searchRelease( string $query = null, array&lt;mixed,string&gt; $filters = array(), boolean $autocomplete = false, integer $start = null, integer $limit = null,  $extras = false ): object
```

Search release.
Use $query parameter to search the release.
The $autocomplete parameter allow you to find release with predictive algorithm.
You can paginate by setting $start and $limit parameters.
You can also enable some filters by the param $filters


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$query` | **string** | Search query |
| `$filters` | **array<mixed,string>** | Filter results. Available filters : artist, format_summary |
| `$autocomplete` | **boolean** | Enable predictive search |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |
| `$extras` | **** |  |




---


### searchTrack

Search Track.

```php
BlitzrClient::searchTrack( string $query = null, array&lt;mixed,string&gt; $filters = array(), boolean $autocomplete = false, integer $start = null, integer $limit = null,  $extras = false ): object
```

Search track.
Use $query parameter to search the track.
The $autocomplete parameter allow you to find track with predictive algorithm.
You can paginate by setting $start and $limit parameters.
You can also enable some filters by the param $filters


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$query` | **string** | Search query |
| `$filters` | **array<mixed,string>** | Filter results. Available filters : artist, release, format_summary |
| `$autocomplete` | **boolean** | Enable predictive search |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |
| `$extras` | **** |  |




---


### getShopArtist

Get all shop items for an artist.

```php
BlitzrClient::getShopArtist( string $product_type = null, string $slug = null, string $uuid = null ): array
```

Get all shop items for an artist.
You must set the $product_type parameter. (cd|lp|mp3|merch)
At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$product_type` | **string** | Type of shop product |
| `$slug` | **string** | Blitzr slug of the artist |
| `$uuid` | **string** | Blitzr uuid of the artist |




---


### getShopLabel

Get all shop items for a label.

```php
BlitzrClient::getShopLabel( string $product_type = null, string $slug = null, string $uuid = null ): array
```

Get all shop items for a label.
You must set the $product_type parameter. (cd|lp|merch)
At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$product_type` | **string** | Type of shop product |
| `$slug` | **string** | Blitzr slug of the label |
| `$uuid` | **string** | Blitzr uuid of the label |




---


### getShopRelease

Get all shop items for a release.

```php
BlitzrClient::getShopRelease( string $product_type = null, string $slug = null, string $uuid = null ): array
```

Get all shop items for a release.
You must set the $product_type parameter. (cd|lp|mp3)
At least one of the $slug or $uuid parameters is mandatory.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$product_type` | **string** | Type of shop product |
| `$slug` | **string** | Blitzr slug of the release |
| `$uuid` | **string** | Blitzr uuid of the release |




---


### getShopTrack

Get all shop items for a track.

```php
BlitzrClient::getShopTrack( string $uuid = null ): array
```

Get all shop items for a track.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$uuid` | **string** | Blitzr uuid of the track |




---


### getTag

Get a tag.

```php
BlitzrClient::getTag( string $slug = null ): object
```

Get a tag by slug


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the tag |




---


### getTagArtists

Get tags's artists.

```php
BlitzrClient::getTagArtists( string $slug = null, integer $start = null, integer $limit = null ): array
```

Get the artists of a tag.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the tag |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getTagReleases

Get tags's releases.

```php
BlitzrClient::getTagReleases( string $slug = null, integer $start = null, integer $limit = null ): array
```

Get the releases of a tag.
You can paginate by setting $start and $limit parameters.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$slug` | **string** | Blitzr slug of the tag |
| `$start` | **integer** | Start from this parameter value, for pagination |
| `$limit` | **integer** | Limit the number of results, for pagination |




---


### getTrack

Get a track.

```php
BlitzrClient::getTrack( string $uuid = null ): object
```

Get a track by uuid


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$uuid` | **string** | Blitzr uuid of the track |




---


### getTrackSources

Get all sources for a track.

```php
BlitzrClient::getTrackSources( string $uuid = null ): array
```

Get all sources for a track.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$uuid` | **string** | Blitzr uuid of the track |




---

## ClientException

ClientException, this exception is fired when the client did not provide all mandatory params.



* Full name: \Blitzr\Exception\ClientException
* Parent class: 



### __construct

ClientException constructor.

```php
ClientException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ClientException toString.

```php
ClientException::__toString(  ): string
```

Return readable exception string





---

## ConfigurationException

ConfigurationException, signal a configuration issue.



* Full name: \Blitzr\Exception\ConfigurationException
* Parent class: 



### __construct

ConfigurationException constructor.

```php
ConfigurationException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ConfigurationException toString.

```php
ConfigurationException::__toString(  ): string
```

Return readable exception string





---

## NetworkException

NetworkException, base exception.



* Full name: \Blitzr\Exception\NetworkException
* Parent class: 



### __construct

NetworkException constructor.

```php
NetworkException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

NetworkException toString.

```php
NetworkException::__toString(  ): string
```

Return readable exception string





---

## ServerException

ServerException, base exception.



* Full name: \Blitzr\Exception\ServerException
* Parent class: 



### __construct

ServerException constructor.

```php
ServerException::__construct( string $message, integer $code, object $previous = null ): null
```

Use this constructor to set the error message and code, eventually give a parent exception.


**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$message` | **string** | Error message |
| `$code` | **integer** | Error code |
| `$previous` | **object** | Previous Exception |




---


### __toString

ServerException toString.

```php
ServerException::__toString(  ): string
```

Return readable exception string





---



--------
> This document was automatically generated from source code comments on 2016-01-25 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
