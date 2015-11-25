<?php

namespace Moccalotto\Math;

class GeoPoint
{
    public $lat;
    public $lon;

    public static function distanceBetween(GeoPoint $p1, GeoPoint $p2)
    {
        return new Distance(69.0801317939 * sqrt(
            ($p2->lat - $p1->lat)
            * ($p2->lat - $p1->lat)
            + cos($p2->lat / 57.29578)
            * cos($p1->lat / 57.29578)
            * ($p2->lon - $p1->lon)
            * ($p2->lon - $p1->lon)
        ), new Units\Length\Meter(), new SiPrefix('k'));
    }

    public function __construct($lat, $lon)
    {
        $this->lat = (double)$lat;
        $this->lon = (double)$lon;
    }

    public function lat()
    {
        return $this->lat;
    }

    public function lon()
    {
        return $this->lon;
    }

    public function distanceTo(GeoPoint $other)
    {
        return static::distanceBetween($this, $other);
    }
}
