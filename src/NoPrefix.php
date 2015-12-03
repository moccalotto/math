<?php

namespace Moccalotto\Math;

/**
 * No prefix.
 *
 * Represents a value without a prefix
 */
class NoPrefix implements Contracts\Prefix
{
    /**
     * Return the factor of the prefix.
     */
    public function factor()
    {
        return 1;
    }

    /**
     * Return the base-10 exponent of the prefix.
     */
    public function exponent()
    {
        return 0;
    }

    /**
     * Return the short name of the prefix.
     *
     * @return string
     */
    public function shortName()
    {
        return '';
    }

    /**
     * Return the long name of the prefix.
     *
     * @return string
     */
    public function name()
    {
        return '';
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
        return $value;
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
        return $value;
    }
}
