<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnFloat;

/**
 * @extends SnNumericList<SnFloat>
 */
class SnFloatList extends SnNumericList
{
    /**
     * Creates SnFloatList instance by native array.
     *
     * @param SnFloat[] $value
     * @return static<SnFloat>
     * @throws AssertionFailedException
     */
    public static function byArray(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnFloat::class)->toArray());
    }

    /**
     * Creates SnFloatList instance by native array which includes single type.
     *
     * @param SnFloat[] $value Base array
     * @return static<SnFloat>
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
     * @return static<SnFloat>
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
     * @return static<SnFloat>
     */
    public static function byFloatArray(array $value)
    {
        return new static(
            array_values(
                array_map(fn(float $v) => SnFloat::byFloat($v), $value)
            )
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

    /**
     * Returns the unique list
     *
     * @return static
     */
    public function distinct()
    {
        $uniqueRawValues = array_values(
            array_unique(
                $this->map(
                    fn(SnFloat $value) => $value->toFloat()
                )->toArray()
            )
        );
        return static::byFloatArray($uniqueRawValues);
    }
}
