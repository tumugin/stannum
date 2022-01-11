<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

class SnPositiveInteger extends SnInteger
{
    /**
     * @throws AssertionFailedException
     */
    public static function byString(string $value): SnPositiveInteger
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid integer.');

        $parsedValue = intval($value);
        Assertion::greaterThan($parsedValue, 0, 'Value must be greater than 0.');

        return new SnPositiveInteger($parsedValue);
    }

    /**
     * @throws AssertionFailedException
     */
    public static function byInt(int $value): SnPositiveInteger
    {
        Assertion::greaterThan($value, 0, 'Value must be greater than 0.');

        return new SnPositiveInteger($value);
    }
}
