<?php 

require '../vendor/autoload.php';

use Blitzr\BlitzrClient;

$blitzr = new BlitzrClient('a5802057a696c5017645de719fbe8ef9');

$test = $blitzr->getArtist('eminem');
var_dump($test);
