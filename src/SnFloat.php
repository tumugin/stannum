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
     * @throws AssertionFailedException
     */
    public static function byString(string $value): SnFloat
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid float.');

        return new SnFloat(floatval($value));
    }

    /**
     * Creates SnFloat instance by integer value.
     *
     * @param int $value Base integer value
     */
    public static function byInt(int $value): SnFloat
    {
        return new SnFloat((float)$value);
    }

    /**
     * Creates SnFloat value by float value.
     *
     * @param float $value Base float value
     */
    public static function byFloat(float $value): SnFloat
    {
        return new SnFloat($value);
    }

    /**
     * Absolute value
     */
    public function abs(): SnFloat
    {
        return new SnFloat(abs($this->value));
    }

    /**
     * Round fractions up
     */
    public function ceil(): SnFloat
    {
        return new SnFloat(ceil($this->value));
    }

    /**
     * Round fractions down
     */
    public function floor()
    {
        return new SnFloat(floor($this->value));
    }
}
