<?php

namespace Tumugin\Stannum;

abstract class SnNumeric
{
    /** @var int|float $_value */
    protected $_value;

    protected function __construct(int $_value)
    {
        $this->_value = $_value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return "{$this->_value}";
    }

    public function toInt(): int
    {
        return (int)$this->_value;
    }

    public function toFloat(): float
    {
        return (float)$this->_value;
    }

    public function isEqual(SnNumeric $value): bool
    {
        return $this->_value === $value->_value;
    }

    public function isGreaterOrEqualThan(SnNumeric $value): bool
    {
        return $this->_value >= $value->_value;
    }

    public function isGreaterThan(SnNumeric $value): bool
    {
        return $this->_value > $value->_value;
    }

    public function lessOrEqualThan(SnNumeric $value): bool
    {
        return $this->_value <= $value->_value;
    }

    public function lessThan(SnNumeric $value): bool
    {
        return $this->_value < $value->_value;
    }

    public function isEven(): bool
    {
        return $this->_value % 2 === 0;
    }

    public function isOdd(): bool
    {
        return !$this->isEven();
    }
}
