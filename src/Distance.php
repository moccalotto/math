<?php

namespace Moccalotto\Math;

use Moccalotto\Math\Contracts\LengthUnit;
use Moccalotto\Math\Contracts\Prefix;
use LogicException;

/**
 * Class representing a distance
 */
class Distance
{
    /**
     * @var int
     */
    protected $meters;

    /**
     * @var Prefix
     */
    protected $prefix;

    /**
     * @var LengthUnit
     */
    protected $unit;

    /**
     * Constructor
     * @param float|int $length
     * @param LengthUnit $unit
     * @param Prefix $prefix
     */
    public function __construct($length, LengthUnit $unit, Prefix $prefix = null)
    {
        if (null === $prefix) {
            $prefix = new NoPrefix();
        }
        $this->meters = $prefix->unprefix($unit->toMeters($length));
        $this->prefix = $prefix;
        $this->unit   = $unit;
    }

    /**
     * Convert the unit and prefix of the distance
     *
     * @param LengthUnit $new_unit
     * @param Prefix $new_unit
     * @return Distance the converted distance
     */
    public function to(LengthUnit $new_unit, Prefix $new_prefix = null)
    {
        if (null === $new_prefix) {
            $prefix = new NoPrefix();
        }
        return new Distance(
            $new_prefix->prefix($new_unit->fromMeters($this->meters)),
            $new_unit,
            $new_prefix
        );
    }

    /**
     * Change the unit of the distance
     * @param LengthUnit $new_unit
     * @return Distance the converted distance
     */
    public function withUnit(LengthUnit $new_unit)
    {
        return $this->to($new_unit, new NoPrefix);
    }

    /**
     * Change the unit of the distance
     * @param Prefix $new_prefix
     * @return Distance the converted distance
     */
    public function withPrefix(Prefix $new_prefix)
    {
        return $this->to($this->unit, $new_prefix);
    }

    /**
     * Remove the prefix from the distance, converting it to the base number
     * @return Distance the converted distance
     */
    public function withoutPrefix()
    {
        return $this->withPrefix(new NoPrefix());
    }

    /**
     * Get the prefix of the distance
     * @return Prefix
     */
    public function prefix()
    {
        return $this->prefix;
    }

    /**
     * Get the unit of the distance
     * @return LengthUnit
     */
    public function unit()
    {
        return $this->unit;
    }

    /**
     * Get the distance in meters
     * @return float
     */
    public function meters()
    {
        return $this->meters;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%.2f%s%s',
            $this->unit->fromMeters($this->prefix->prefix($this->meters)),
            $this->prefix->shortName(),
            $this->unit->shortName()
        );
    }
}
