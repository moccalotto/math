<?php

namespace Moccalotto\Math;

use Moccalotto\Math\Contracts\LengthUnit;
use Moccalotto\Math\Contracts\Prefix;
use LogicException;

class Distance
{
    protected $meters;
    protected $prefix;
    protected $unit;

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
     * @param LengthUnit $new_unit
     * @param Prefix $new_unit
     * @return Distance
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

    public function withUnit(LengthUnit $new_unit)
    {
        return $this->to($new_unit, new NoPrefix);
    }

    public function withPrefix(Prefix $new_prefix)
    {
        return $this->to($this->unit, $new_prefix);
    }

    public function withoutPrefix()
    {
        return $this->withPrefix(new NoPrefix());
    }

    public function prefix()
    {
        return $this->prefix;
    }

    public function unit()
    {
        return $this->unit;
    }

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
