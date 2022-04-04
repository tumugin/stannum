<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Assert\AssertionFailedException;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnString;

trait SnListConvertable
{
    abstract public function toArray(): array;

    /**
     * Convert to SnFloatList
     *
     * @throws AssertionFailedException
     */
    public function toSnFloatList(): SnFloatList
    {
        /** @var SnFloat[] $baseArray */
        $baseArray = $this->toArray();

        return SnFloatList::byArray($baseArray);
    }

    /**
     * Convert to SnIntegerList
     *
     * @throws AssertionFailedException
     */
    public function toSnIntegerList(): SnIntegerList
    {
        /** @var SnInteger[] $baseArray */
        $baseArray = $this->toArray();

        return SnIntegerList::byArray($baseArray);
    }

    /**
     * Convert to SnStringList
     *
     * @throws AssertionFailedException
     */
    public function toSnStringList(): SnStringList
    {
        /** @var SnString[] $baseArray */
        $baseArray = $this->toArray();

        return SnStringList::byArray($baseArray);
    }
}
