<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;

class SnFloat extends SnNumeric
{
    public static function byString(string $value): SnFloat
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid float.');

        return new SnFloat(floatval($value));
    }

    public static function byInt(int $value): SnFloat
    {
        return new SnFloat((float)$value);
    }

    public static function byFloat(float $value): SnFloat
    {
        return new SnFloat($value);
    }

    public function abs(): SnFloat
    {
        return new SnFloat(abs($this->value));
    }

    public function ceil(): SnFloat
    {
        return new SnFloat(ceil($this->value));
    }
}
