<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList;

class SnIntegerList extends SnNumericList
{
    /**
     * @throws AssertionFailedException
     */
    public static function fromArray(array $value): SnIntegerList
    {
        return new SnIntegerList(parent::fromArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    public static function fromArrayStrict(array $value): SnIntegerList
    {
        return new SnIntegerList(parent::fromArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    public static function fromArrayStrictWithType(array $value, string $type): SnIntegerList
    {
        Assertion::same($type, SnInteger::class, '$type must be SnInteger');
        return new SnIntegerList(parent::fromArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * @param int[] $value
     */
    public static function fromIntArray(array $value): SnIntegerList
    {
        return new SnIntegerList(
            SnList::fromArrayStrictWithType($value, 'integer')->toArray()
        );
    }

    public function total(): SnInteger
    {
        return parent::total();
    }

    public function average(): SnInteger
    {
        return parent::average();
    }

    public function max(): SnInteger
    {
        return parent::max();
    }

    public function min(): SnInteger
    {
        return parent::min();
    }

    /**
     * @param SnInteger $needle
     * @throws AssertionFailedException
     */
    public function contains($needle): bool
    {
        Assertion::true(
            getType($needle) === 'object' && get_class($needle) === SnInteger::class,
            '$needle must be type of SnInteger'
        );

        return in_array(
            $needle->toInt(),
            $this->map(fn(SnInteger $v) => $v->toInt())->toArray(),
            true
        );
    }
}
