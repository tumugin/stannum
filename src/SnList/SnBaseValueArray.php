<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnBaseValue;
use Tumugin\Stannum\SnList;

/**
 * @template T of SnBaseValue
 * @extends SnList<T>
 */
abstract class SnBaseValueArray extends SnList
{
    /**
     * Returns the value specified is included in list
     *
     * @param T $needle Value to find in the list
     * @throws AssertionFailedException
     */
    public function contains($needle): bool
    {
        Assertion::true(
            getType($needle) === 'object' && $needle instanceof SnBaseValue,
            '$needle must be type of SnBaseValue'
        );

        return in_array(
            $needle->getRawValue(),
            $this->map(fn(SnBaseValue $baseValue) => $baseValue->getRawValue())->toArray(),
            true
        );
    }
}
