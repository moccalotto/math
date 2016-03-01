# Math
[![Build Status](https://travis-ci.org/moccalotto/math.svg?branch=master)](https://travis-ci.org/moccalotto/math)

Simple math library.

Currently, we can only calculate geo-distances.

## Installation

To add this package as a local, per-project dependency to your project, simply add a dependency on
 `moccalotto/math` to your project's `composer.json` file like so:

```json
{
    "require": {
        "moccalotto/math": "~0.1"
    }
}
```

Alternatively simply call `composer require moccalotto/math`


## Demo

```php
<?php

// CALCULATE THE DISTANCE BETWEEN TWO LOCATIONS ON EARTH

use Moccalotto\Math\GeoPoint;
use Moccalotto\Math\Units;

require 'vendor/autoload.php';

// Create objects from two geo locations
$p1 = new GeoPoint(57.089299, 9.974567);
$p2 = new GeoPoint(57.105725, 10.032659);

// print the distance (in KM) between the points
print $p1->distanceTo($p2).PHP_EOL;

// print the distance (in miles) between the points
print $p1->distanceTo($p2)->to(new Units\Length\Mile).PHP_EOL;
```
