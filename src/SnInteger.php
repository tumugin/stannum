<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;

class SnInteger extends SnNumeric
{
    public static function byString(string $value): SnInteger
    {
        Assertion::true(filter_var($value, FILTER_VALIDATE_INT), 'Input $value is not valid integer.');

        return new SnInteger(intval($value));
    }

    public static function byInt(int $value): SnInteger
    {
        return new SnInteger($value);
    }

    public function clone(): SnInteger
    {
        return new SnInteger($this->value);
    }

    public function abs(): SnInteger
    {
        return new SnInteger(abs($this->value));
    }
}
