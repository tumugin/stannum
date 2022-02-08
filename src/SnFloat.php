<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Wrapper class of float value
 */
class SnFloat extends SnNumeric
{
    /**
     * Creates SnFloat instance by parsable string.
     *
     * @param string $value String value can be parsed as float. (e.g. '0.9144')
     * @return static
     * @throws AssertionFailedException
     */
    public static function byString(string $value)
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid float.');

        return new static(floatval($value));
    }

    /**
     * Creates SnFloat instance by integer value.
     *
     * @param int $value Base integer value
     * @return static
     */
    public static function byInt(int $value)
    {
        return new static((float)$value);
    }

    /**
     * Creates SnFloat value by float value.
     *
     * @param float $value Base float value
     * @return static
     */
    public static function byFloat(float $value)
    {
        return new static($value);
    }

    /**
     * Absolute value
     *
     * @return static
     */
    public function abs()
    {
        return parent::abs();
    }

    /**
     * Round fractions up
     *
     * @return static
     */
    public function ceil()
    {
        return new static(ceil($this->value));
    }

    /**
     * Round fractions down
     *
     * @return static
     */
    public function floor()
    {
        return new static(floor($this->value));
    }
}
