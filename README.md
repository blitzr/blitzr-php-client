# Blitzr Official PHP Client

This client makes it easy to deal with Blitzr API.
Just integrate it to your project with *composer* and enjoy.

To use this client you will need an API key, you can request it at : [developer.blitzr.com](https://developer.blitzr.com).

## Getting started

First step, require blitzr-php-client with composer :

```bash
$ composer require blitzr/php-client
```

Then just require the composer autoloader in your PHP file and use the client :

```php
// require the composer autoloader
require 'vendor/autoload.php';

// use the Blitzr client
use Blitzr\BlitzrClient;

// create an instance of Blitzr client
$blitzr = new BlitzrClient('your-api-key');

// request an artist
$artist = $blitzr->getArtist('year-of-no-light');
```

That's all !

## Documentation

You can find the documentation [here](doc/).
