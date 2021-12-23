<?php
declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;

class SnInteger
{
    private int $_value;

    protected function __construct(int $_value)
    {
        $this->_value = $_value;
    }

    public static function byString(string $value): SnInteger
    {
        Assertion::true(filter_var($value, FILTER_VALIDATE_INT), 'Input $value is not valid integer.');

        return new SnInteger(intval($value));
    }

    public static function byInt(int $value): SnInteger
    {
        return new SnInteger($value);
    }

    public function toInt(): int
    {
        return $this->_value;
    }

    public function isEqual(SnInteger $sn_value): bool
    {
        return $this->_value === $sn_value->_value;
    }

    public function isGreaterOrEqualThan(SnInteger $value): bool
    {
        return $this->_value >= $value->$value;
    }

    public function isGreaterThan(SnInteger $value): bool
    {
        return $this->_value > $value->$value;
    }

    public function lessOrEqualThan(SnInteger $value): bool
    {
        return $this->_value <= $value;
    }

    public function lessThan(SnInteger $value): bool
    {
        return $this->_value < $value;
    }
}
