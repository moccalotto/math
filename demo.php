<?php

// CALCULATE THE DISTANCE BETWEEN TWO LOCATIONS ON EARTH

use Moccalotto\Math\GeoPoint;
use Moccalotto\Math\Units;

require 'vendor/autoload.php';

// Create objects from two geo locations
$p1 = new GeoPoint(57.089299, 9.974567);
$p2 = new GeoPoint(57.105725, 10.032659);

// print the distance (in KM) between the points
print $p1->distanceTo($p2) . PHP_EOL;

// print the distance (in KM) between the points
print $p1->distanceTo($p2)->to(new Units\Length\Mile) . PHP_EOL;
