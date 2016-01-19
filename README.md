# Blitzr Official PHP Client

This client makes it easy to deal with Blitzr API.
Just integrate it to your project with *composer* and enjoy.

To use this client you will need an API key, you can request it at : [developer.blitzr.com](https://developer.blitzr.com).

## Installation

First step, create/upgrade your composer.json :

    {
        "repositories": [
            {
                "type": "git",
                "url": "git@github.com:Blitzr/blitzr-php-client.git"
            }
        ],
        "require": {
            "blitzr/php-client": "dev-develop"
        }
    }

And install/update your project :

    // Install
    $ composer install
    // Or update
    $ composer update

Then just require teh composer autoloader in your PHP file and use the client :

    // index.php
    <?php 

    // require the composer autoloader
    require 'vendor/autoload.php';

    // use the Blitzr client
    use Blitzr\BlitzrClient;

    // create an instance of Blitzr client
    $blitzr = new BlitzrClient('your-api-key');

    // request an artist
    $artist = $blitzr->getArtist('year-of-no-light');

That's all !
