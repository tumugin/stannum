<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnList;

class SnFloatList extends SnNumericList
{
    /**
     * Creates SnFloatList instance by native array.
     *
     * @throws AssertionFailedException
     * @return static
     */
    public static function byArray(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnFloat::class)->toArray());
    }

    /**
     * Creates SnFloatList instance by native array which includes single type.
     *
     * @param SnFloat[] $value Base array
     * @return static
     * @throws AssertionFailedException
     */
    public static function byArrayStrict(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnFloat::class)->toArray());
    }

    /**
     * Creates SnFloatList instance by native array which includes only one specified type.
     *
     * @param SnFloat[] $value Base array
     * @param string $type type of value
     * @return static
     * @throws AssertionFailedException
     */
    public static function byArrayStrictWithType(array $value, string $type)
    {
        Assertion::same($type, SnFloat::class, '$type must be SnInteger');
        return new static(parent::byArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * Creates SnFloatList instance by native float array.
     *
     * @param float[] $value
     * @return static
     * @throws AssertionFailedException
     */
    public static function byFloatArray(array $value)
    {
        return new static(
            SnList::byArrayStrictWithType($value, 'double')
                ->map(fn(float $v) => SnFloat::byFloat($v))
                ->toArray()
        );
    }

    /**
     * Convert to native float array.
     *
     * @return float[]
     */
    public function toFloatArray(): array
    {
        return $this
            ->map(fn(SnFloat $v) => $v->toFloat())
            ->toArray();
    }

    public function total(): SnFloat
    {
        return parent::total();
    }

    public function max(): SnFloat
    {
        return parent::max();
    }

    public function min(): SnFloat
    {
        return parent::min();
    }

    public function average(): SnFloat
    {
        return parent::average();
    }
}
