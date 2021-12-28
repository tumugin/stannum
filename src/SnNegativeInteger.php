<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

class SnNegativeInteger extends SnInteger
{
    /**
     * @throws AssertionFailedException
     */
    public static function byString(string $value): SnNegativeInteger
    {
        Assertion::true(filter_var($value, FILTER_VALIDATE_INT), 'Input value is not valid integer.');
        $parsed_value = intval($value);
        Assertion::lessThan($parsed_value, 0, 'Value must be less than 0.');

        return new SnNegativeInteger($parsed_value);
    }

    /**
     * @throws AssertionFailedException
     */
    public static function byInt(int $value): SnNegativeInteger
    {
        Assertion::lessThan($value, 0, 'Value must be less than 0.');

        return new SnNegativeInteger($value);
    }
}
