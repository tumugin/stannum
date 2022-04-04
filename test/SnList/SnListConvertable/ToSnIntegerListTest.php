<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnListConvertable;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList;

class ToSnIntegerListTest extends TestCase
{
    public function testToSnIntegerList(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnList::byArray([
                SnInteger::byInt(1),
                SnInteger::byInt(2),
                SnInteger::byInt(3),
            ])
                ->toSnIntegerList()
                ->toIntArray()
        );
    }
}
