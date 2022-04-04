<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnListConvertable;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnList;

class ToSnFloatListTest extends TestCase
{
    public function testToSnFloatList(): void
    {
        $this->assertSame(
            [1.0, 2.0, 3.0],
            SnList::byArray([
                SnFloat::byFloat(1.0),
                SnFloat::byFloat(2.0),
                SnFloat::byFloat(3.0),
            ])
                ->toSnFloatList()
                ->toFloatArray()
        );
    }
}
