Blitzr Official PHP Client
================

A PHP API client for the [Blitzr API](https://blitzr.io).

To use this client you will need an API key, you can request it at : [https://blitzr.io](https://blitzr.io/#contact).


----------

Documentation
---------------

You can find the [complete package documentation](docs/).

You can also refer to the official [Blitzr API reference](https://blitzr.io/doc) to have more informations.
----------


Installation
---------------

Just integrate it to your project with *composer* and enjoy.

```bash
$ composer require blitzr/php-client
```


----------

Getting Started
---------------------

Just require the composer autoloader in your PHP file and use the client :


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
