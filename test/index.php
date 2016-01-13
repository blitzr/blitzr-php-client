<?php 

require '../vendor/autoload.php';

use Blitzr\BlitzrClient;

$blitzr = new BlitzrClient('a5802057a696c5017645de719fbe8ef9');

$date_start = new \DateTime("2016-01-16 11:14:15.638276");
$date_end = new \DateTime("2016-01-25 11:14:15.638276");

echo $date_start->format(\DateTime::ISO8601) . "\n";

var_dump($blitzr->getEvents('FR', 44.84044, -0.5805, $date_start, $date_end, 10, 0, 2));