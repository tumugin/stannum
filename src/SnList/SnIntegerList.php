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
    public static function fromArray(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    public static function fromArrayStrict(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnInteger::class)->toArray());
    }

    public static function fromArrayStrictWithType(array $value, string $type): self
    {
        Assertion::same($type, SnInteger::class, '$type must be SnInteger');
        return new static(parent::fromArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * @param int[] $value
     */
    public static function fromIntArray(array $value): self
    {
        return new static(
            SnList::fromArrayStrictWithType($value, 'integer')
                ->map(fn(int $v) => SnInteger::byInt($v))
                ->toArray()
        );
    }

    /**
     * @return int[]
     */
    public function toIntArray(): array
    {
        return $this
            ->map(fn(SnInteger $v) => $v->toInt())
            ->toArray();
    }

    public function total(): SnInteger
    {
        return parent::total();
    }

    public function max(): SnInteger
    {
        return parent::max();
    }

    public function min(): SnInteger
    {
        return parent::min();
    }
}
