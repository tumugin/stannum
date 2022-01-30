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
    public static function byString(string $value): self
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid float.');

        return new static(floatval($value));
    }

    /**
     * Creates SnFloat instance by integer value.
     *
     * @param int $value Base integer value
     */
    public static function byInt(int $value): self
    {
        return new static((float)$value);
    }

    /**
     * Creates SnFloat value by float value.
     *
     * @param float $value Base float value
     */
    public static function byFloat(float $value): self
    {
        return new static($value);
    }

    /**
     * Absolute value
     */
    public function abs(): self
    {
        return parent::abs();
    }

    /**
     * Round fractions up
     */
    public function ceil(): self
    {
        return new static(ceil($this->value));
    }

    /**
     * Round fractions down
     */
    public function floor(): self
    {
        return new static(floor($this->value));
    }
}
