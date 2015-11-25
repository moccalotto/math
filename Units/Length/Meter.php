<?php

namespace Moccalotto\Math\Units\Length;

use Moccalotto\Math\Contracts\LengthUnit;

class Meter implements LengthUnit
{
    public function meterFactor()
    {
        return 1;
    }

    public function toMeters($value)
    {
        return $value;
    }

    public function fromMeters($value)
    {
        return $value;
    }

    public function shortName()
    {
        return 'm';
    }

    public function longName($plural = false)
    {
        return $plural ? 'meters' : 'meter';
    }
}
