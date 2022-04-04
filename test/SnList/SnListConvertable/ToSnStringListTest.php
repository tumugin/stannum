<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnListConvertable;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;
use Tumugin\Stannum\SnString;

class ToSnStringListTest extends TestCase
{
    public function testToSnStringList(): void
    {
        $this->assertSame(
            ['藍井すず', '藤宮めい', '橋本あみ'],
            SnList::byArray([
                SnString::byString('藍井すず'),
                SnString::byString('藤宮めい'),
                SnString::byString('橋本あみ'),
            ])
                ->toSnStringList()
                ->toStringArray()
        );
    }
}
