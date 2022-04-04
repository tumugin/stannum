<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnBaseValue;
use Tumugin\Stannum\SnString;

/**
 * @extends SnBaseValueArray<SnString>
 */
class SnStringList extends SnBaseValueArray
{
    /**
     * Creates SnStringList instance by native array.
     *
     * @param SnString[] $value Base array
     * @return static<SnString>
     * @throws AssertionFailedException
     */
    public static function byArray(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnString::class)->toArray());
    }

    /**
     * Creates SnStringList instance by native array which includes single type.
     *
     * @param SnString[] $value Base array
     * @return static<SnString>
     * @throws AssertionFailedException
     */
    public static function byArrayStrict(array $value)
    {
        return new static(parent::byArrayStrictWithType($value, SnString::class)->toArray());
    }

    /**
     * Creates SnStringList instance by native array which includes only one specified type.
     *
     * @param SnString[] $value Base array
     * @param string $type type of value
     * @return static<SnString>
     * @throws AssertionFailedException
     */
    public static function byArrayStrictWithType(array $value, string $type)
    {
        Assertion::same($type, SnString::class, '$type must be SnString');
        return new static(parent::byArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * Creates SnStringList instance by native string array.
     *
     * @param string[] $value
     * @return static<SnString>
     * @throws AssertionFailedException
     */
    public static function byStringArray(array $value)
    {
        return new static(
            parent::byArrayStrictWithType($value, 'string')
                ->map(fn(string $s) => SnString::byString($s))
                ->toArray()
        );
    }

    /**
     * Creates a string from all the elements separated using separator.
     *
     * @param SnString $separator the separator string to separate elements
     * @throws AssertionFailedException
     */
    public function joinToString(SnString $separator): SnString
    {
        return SnString::byString(
            implode($separator->toString(), $this->value)
        );
    }

    /**
     * Returns raw string array
     *
     * @return string[]
     */
    public function toStringArray(): array
    {
        return $this
            ->map(fn(SnString $s) => $s->toString())
            ->toArray();
    }

    /**
     * Returns the unique list
     *
     * @return static
     * @throws AssertionFailedException
     */
    public function distinct()
    {
        $uniqueRawValues = array_values(
            array_unique(
                $this->map(
                    fn(SnBaseValue $baseValue) => $baseValue->getRawValue()
                )->toArray()
            )
        );
        return static::byStringArray($uniqueRawValues);
    }
}
