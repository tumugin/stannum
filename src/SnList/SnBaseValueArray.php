<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnBaseValue;
use Tumugin\Stannum\SnList;

abstract class SnBaseValueArray extends SnList
{
    /**
     * Returns the value specified is included in list
     *
     * @param SnBaseValue $needle Value to find in the list
     * @throws AssertionFailedException
     */
    public function contains($needle): bool
    {
        Assertion::true(
            getType($needle) === 'object' && is_subclass_of($needle, SnBaseValue::class),
            '$needle must be type of SnBaseValue'
        );

        return in_array(
            $needle->getRawValue(),
            $this->map(fn(SnBaseValue $baseValue) => $baseValue->getRawValue())->toArray(),
            true
        );
    }
}
