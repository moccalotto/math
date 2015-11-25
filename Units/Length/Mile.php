<?php

namespace Moccalotto\Math\Units\Length;

use Moccalotto\Math\Contracts\LengthUnit;

class Mile implements LengthUnit
{
    protected $factor = 1609.34;

    public function meterFactor()
    {
        return $this->factor;
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
        return 'mi';
    }

    public function longName($plural = false)
    {
        return $plural ? 'miles' : 'mile';
    }
}
