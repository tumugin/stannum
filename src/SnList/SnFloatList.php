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
     * @throws AssertionFailedException
     */
    public static function fromArray(array $value): self
    {
        return new self(parent::fromArrayStrictWithType($value, SnFloat::class)->toArray());
    }

    public static function fromArrayStrict(array $value): self
    {
        return new self(parent::fromArrayStrictWithType($value, SnFloat::class)->toArray());
    }

    public static function fromArrayStrictWithType(array $value, string $type): self
    {
        Assertion::same($type, SnFloat::class, '$type must be SnInteger');
        return new self(parent::fromArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * @param float[] $value
     */
    public static function fromFloatArray(array $value): self
    {
        return new self(
            SnList::fromArrayStrictWithType($value, 'double')
                ->map(fn(float $v) => SnFloat::byFloat($v))
                ->toArray()
        );
    }

    /**
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

    /**
     * @param SnFloat $needle
     * @throws AssertionFailedException
     */
    public function contains($needle): bool
    {
        Assertion::true(
            getType($needle) === 'object' && get_class($needle) === SnFloat::class,
            '$needle must be type of SnInteger'
        );

        return in_array(
            $needle->toFloat(),
            $this->map(fn(SnFloat $v) => $v->toFloat())->toArray(),
            true
        );
    }
}
