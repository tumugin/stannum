<?php
declare(strict_types=1);

namespace Tumugin\Stannum;

abstract class SnNumeric
{
    /** @var int|float $value */
    protected $value;

    /**
     * @param int|float $_value
     */
    protected function __construct($_value)
    {
        $this->value = $_value;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return "{$this->value}";
    }

    public function toInt(): int
    {
        return (int)$this->value;
    }

    public function toFloat(): float
    {
        return (float)$this->value;
    }

    public function isEqual(SnNumeric $value): bool
    {
        return $this->value === $value->value;
    }

    public function isGreaterOrEqualThan(SnNumeric $value): bool
    {
        return $this->value >= $value->value;
    }

    public function isGreaterThan(SnNumeric $value): bool
    {
        return $this->value > $value->value;
    }

    public function lessOrEqualThan(SnNumeric $value): bool
    {
        return $this->value <= $value->value;
    }

    public function lessThan(SnNumeric $value): bool
    {
        return $this->value < $value->value;
    }

    public function isEven(): bool
    {
        return $this->value % 2 === 0;
    }

    public function isOdd(): bool
    {
        return !$this->isEven();
    }
}
