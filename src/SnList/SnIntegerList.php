<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnInteger;

/**
 * @extends SnNumericList<SnInteger>
 */
class SnIntegerList extends SnNumericList
{
    /**
     * Creates SnIntegerList instance by native array.
     *
     * @param SnInteger[] $value
     * @return static<SnInteger>
     * @throws AssertionFailedException
     */
    public static function byArray(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    /**
     * Creates SnIntegerList instance by native array which includes single type.
     *
     * @param SnInteger[] $value Base array
     * @return static<SnInteger>
     * @throws AssertionFailedException
     */
    public static function byArrayStrict(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    /**
     * Creates SnIntegerList instance by native array which includes only one specified type.
     *
     * @param SnInteger[] $value Base array
     * @param string $type Type of value
     * @return static<SnInteger>
     * @throws AssertionFailedException
     */
    public static function byArrayStrictWithType(array $value, string $type)
    {
        Assertion::same($type, SnInteger::class, '$type must be SnInteger');
        return new static(parent::byArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * Creates SnFloatList instance by native integer array.
     *
     * @param int[] $value Base array
     * @return static<SnInteger>
     */
    public static function byIntArray(array $value)
    {
        return new static(
            array_values(
                array_map(fn(int $v) => SnInteger::byInt($v), $value)
            )
        );
    }

    /**
     * Convert to native int array.
     *
     * @return int[]
     */
    public function toIntArray(): array
    {
        return $this
            ->map(fn(SnInteger $v) => $v->toInt())
            ->toArray();
    }
}
