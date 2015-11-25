<?php

namespace Moccalotto\Math\Units\Length;

use Moccalotto\Math\Contracts\LengthUnit;

class Foot implements LengthUnit
{
    protected $factor = 0.3048;

    public function meterFactor()
    {
        return $this->meterFactor;
    }

    public function toMeters($value)
    {
        return $this->factor * $value;
    }

    public function fromMeters($value)
    {
        return $value / $this->factor;
    }

    public function shortName()
    {
        return 'ft';
    }

    public function longName($plural = false)
    {
        return $plural ? 'foot' : 'feet';
    }
}


