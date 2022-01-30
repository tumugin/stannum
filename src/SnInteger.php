<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Wrapper class of integer value
 */
class SnInteger extends SnNumeric
{
    /**
     * Creates SnInteger instance by parsable string.
     *
     * @param string $value String value can be parsed as integer. (e.g. '100')
     * @throws AssertionFailedException
     */
    public static function byString(string $value): SnInteger
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid integer.');

        return new SnInteger(intval($value));
    }

    /**
     * Creates SnInteger instance by integer value.
     *
     * @param int $value
     * @return SnInteger
     */
    public static function byInt(int $value): SnInteger
    {
        return new SnInteger($value);
    }

    /**
     * Absolute value
     *
     * @return SnInteger
     */
    public function abs(): SnInteger
    {
        return parent::abs();
    }
}
