<?php
declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;

class SnFloat extends SnNumeric
{
    public static function byString(string $value): SnFloat
    {
        Assertion::true(filter_var($value, FILTER_VALIDATE_FLOAT), 'Input $value is not valid float.');

        return new SnFloat(floatval($value));
    }

    public static function byInt(int $value): SnFloat
    {
        return new SnFloat((float)$value);
    }

    public function clone(): SnFloat
    {
        return new SnFloat($this->_value);
    }

    public function abs(): SnFloat
    {
        return new SnFloat(abs($this->_value));
    }

    public function ceil(): SnFloat
    {
        return new SnFloat(ceil($this->_value));
    }
}
