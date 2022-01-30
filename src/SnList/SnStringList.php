<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnString;

class SnStringList extends SnBaseValueArray
{
    /**
     * Creates SnStringList instance by native array.
     *
     * @param SnString[] $value Base array
     * @throws AssertionFailedException
     */
    public static function fromArray(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnString::class)->toArray());
    }

    /**
     * Creates SnStringList instance by native array which includes single type.
     *
     * @param SnString[] $value Base array
     * @throws AssertionFailedException
     */
    public static function fromArrayStrict(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnString::class)->toArray());
    }

    /**
     * Creates SnStringList instance by native array which includes only one specified type.
     *
     * @param SnString[] $value Base array
     * @param string $type type of value
     * @return SnStringList
     * @throws AssertionFailedException
     */
    public static function fromArrayStrictWithType(array $value, string $type): self
    {
        Assertion::same($type, SnString::class, '$type must be SnString');
        return new static(parent::fromArrayStrictWithType($value, $type)->toArray());
    }
}
