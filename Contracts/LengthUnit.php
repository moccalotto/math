<?php

namespace Moccalotto\Math\Contracts;

interface LengthUnit
{
    /**
     * @return int|float
     */
    public function meterFactor();

    /**
     * @param int|float $value
     * @return int|float
     */
    public function toMeters($value);

    /**
     * @param int|float $value
     * @return int|float
     */
    public function fromMeters($value);

    /**
     * @return string
     */
    public function shortName();

    /**
     * @param bool $plural
     * @return string
     */
    public function longName();
}
