<?php

namespace Moccalotto\Math;

use UnexpectedValueException;

/**
 * SI prefix.
 */
class SiPrefix implements Contracts\Prefix
{
    /**
     * @var string
     */
    protected $shortName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $exponent;

    /**
     * @var array
     */
    protected static $shorthands = [
        'Y' => ['yotta',  24],
        'Z' => ['zeta',   21],
        'E' => ['exa',    18],
        'P' => ['peta',   15],
        'T' => ['tera',   12],
        'G' => ['giga',    9],
        'M' => ['mega',    6],
        'k' => ['kilo',    3],
        'm' => ['milli',  -3],
        'µ' => ['micro',  -6],
        'n' => ['nano',   -9],
        'p' => ['pico',  -12],
        'f' => ['femto', -15],
        'a' => ['atto',  -18],
        'z' => ['zepto', -21],
        'y' => ['yocto', -24],
    ];

    /**
     * Constructor.
     *
     * @param string $name the name (or short name) of the SI unit.
     */
    public function __construct($name)
    {
        if (isset(static::$shorthands[$name])) {
            $this->shortName = $name;
            $this->exponent = static::$shorthands[$name][1];
            $this->name = static::$shorthands[$name][0];

            return;
        }

        $name_lower = strtolower($name);
        foreach (static::$shorthands as $shortName => list($candidate_name, $exponent)) {
            if ($name_lower == $candidate_name) {
                $this->shortName = $shortName;
                $this->exponent = $exponent;
                $this->name = $candidate_name;

                return;
            }
        }
        throw new UnexpectedValueException(sprintf(
            'invalid value "%s".',
            $name
        ));
    }

    /**
     * Return the factor of the prefix.
     */
    public function factor()
    {
        return 10 ** $this->exponent;
    }

    /**
     * Return the base-10 exponent of the prefix.
     */
    public function exponent()
    {
        return $this->exponent;
    }

    /**
     * Return the short name of the prefix.
     *
     * @return string
     */
    public function shortName()
    {
        return $this->shortName;
    }

    /**
     * Return the long name of the prefix.
     *
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Turn a prefixed value into its non-prefixed equivalent.
     *
     * @param int|float $value
     *
     * @return int|float
     */
    public function unprefix($value)
    {
        return $this->factor() * $value;
    }

    /**
     * Turn a nonn-prefixed value into its prefixed equivalent.
     *
     * @param int|float $value
     *
     * @return int|float
     */
    public function prefix($value)
    {
        return $value / $this->factor();
    }
}
