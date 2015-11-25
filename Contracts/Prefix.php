<?php

namespace Moccalotto\Math\Contracts;

interface Prefix
{
    /**
     * Return the factor of the prefix
     */
    public function factor();

    /**
     * Return the base-10 exponent of the prefix
     */
    public function exponent();

    /**
     * Return the short name of the prefix
     *
     * @return string
     */
    public function shortName();

    /**
     * Return the long name of the prefix
     *
     * @return string
     */
    public function name();

    /**
     * Turn a prefixed value into its non-prefixed equivalent
     * @param int|float $value
     * @return int|float
     */
    public function unprefix($value);

    /**
     * Turn a nonn-prefixed value into its prefixed equivalent
     * @param int|float $value
     * @return int|float
     */
    public function prefix($value);
}
