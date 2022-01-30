<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnList;
use Tumugin\Stannum\SnString;

class SnStringList extends SnList
{
    /**
     * @throws AssertionFailedException
     */
    public static function fromArray(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnString::class)->toArray());
    }

    public static function fromArrayStrict(array $value): self
    {
        return new static(parent::fromArrayStrictWithType($value, SnString::class)->toArray());
    }

    public static function fromArrayStrictWithType(array $value, string $type): self
    {
        Assertion::same($type, SnString::class, '$type must be SnString');
        return new static(parent::fromArrayStrictWithType($value, $type)->toArray());
    }

    /**
     * @param SnString $needle
     * @throws AssertionFailedException
     */
    public function contains($needle): bool
    {
        Assertion::true(
            getType($needle) === 'object' && get_class($needle) === SnString::class,
            '$needle must be type of SnString'
        );

        return in_array(
            $needle->toString(),
            $this->map(fn(SnString $snString) => $snString->toString())->toArray(),
            true
        );
    }
}
