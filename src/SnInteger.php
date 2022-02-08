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
     * @return static
     * @throws AssertionFailedException
     */
    public static function byString(string $value)
    {
        Assertion::true(is_numeric($value), 'Input $value is not valid integer.');

        return new static(intval($value));
    }

    /**
     * Creates SnInteger instance by integer value.
     *
     * @param int $value
     * @return static
     */
    public static function byInt(int $value)
    {
        return new static($value);
    }

    /**
     * Absolute value
     *
     * @return static
     */
    public function abs()
    {
        return parent::abs();
    }
}
