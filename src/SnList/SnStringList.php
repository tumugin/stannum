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
    public static function fromArray(array $value): SnList
    {
        return parent::fromArrayStrictWithType($value, SnString::class);
    }

    public static function fromArrayStrict(array $value): SnList
    {
        return parent::fromArrayStrictWithType($value, SnString::class);
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

        return in_array($needle, $this->value, true);
    }
}
