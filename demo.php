<?php

namespace Moccalotto\Math;

require 'vendor/autoload.php';

$p1 = new GeoPoint(57.089299, 9.974567);
$p2 = new GeoPoint(57.105725, 10.032659);

print_r((string)$p1->distanceTo($p2));
