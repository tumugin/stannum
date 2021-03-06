<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

/**
 * Base class of SnInteger and SnFloat.
 *
 * @extends SnBaseValue<int|float>
 */
abstract class SnNumeric extends SnBaseValue
{
    /** @var int|float $value Internal raw value. */
    protected $value;

    /**
     * internal: Creates instance by raw value.
     *
     * @param int|float $_value
     */
    final protected function __construct($_value)
    {
        $this->value = $_value;
    }

    /**
     * internal: Converts to raw string value.
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Converts to raw string value.
     */
    public function toString(): string
    {
        return "{$this->value}";
    }

    /**
     * Converts to raw integer value.
     */
    public function toInt(): int
    {
        return (int)$this->value;
    }

    /**
     * Converts to raw float value
     */
    public function toFloat(): float
    {
        return (float)$this->value;
    }

    /**
     * Returns the passed SnNumeric value is same as is.
     *
     * @param self|int|float $value The SnNumeric or raw numeric value that will be compared.
     */
    public function isEqual($value): bool
    {
        $rawValue = is_int($value) || is_float($value) ? $value : $value->value;
        return $this->value === $rawValue;
    }

    /**
     * Returns the passed SnNumeric value is greater or equal than self.
     *
     * @param self|int|float $value The SnNumeric it will be compared.
     */
    public function isGreaterOrEqualThan($value): bool
    {
        $rawValue = is_int($value) || is_float($value) ? $value : $value->value;
        return $this->value >= $rawValue;
    }

    /**
     * Returns the passed SnNumeric value is greater than self.
     *
     * @param self|int|float $value The SnNumeric it will be compared.
     */
    public function isGreaterThan($value): bool
    {
        $rawValue = is_int($value) || is_float($value) ? $value : $value->value;
        return $this->value > $rawValue;
    }

    /**
     * Returns the passed SnNumeric value is less or equal than self.
     *
     * @param self|int|float $value The SnNumeric it will be compared.
     */
    public function isLessOrEqualThan($value): bool
    {
        $rawValue = is_int($value) || is_float($value) ? $value : $value->value;
        return $this->value <= $rawValue;
    }

    /**
     * Returns the passed SnNumeric value is less than self.
     *
     * @param self|int|float $value The SnNumeric it will be compared.
     */
    public function isLessThan($value): bool
    {
        $rawValue = is_int($value) || is_float($value) ? $value : $value->value;
        return $this->value < $rawValue;
    }

    /**
     * Returns the value is even.
     */
    public function isEven(): bool
    {
        return $this->value % 2 === 0;
    }

    /**
     * Returns the value is odd.
     */
    public function isOdd(): bool
    {
        return !$this->isEven();
    }

    /**
     * Absolute value
     *
     * @return static
     */
    public function abs()
    {
        return new static(abs($this->value));
    }

    /**
     * @return float|int
     */
    public function getRawValue()
    {
        return $this->value;
    }
}
