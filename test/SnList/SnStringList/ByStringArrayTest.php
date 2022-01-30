<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;

class ByStringArrayTest extends TestCase
{
    public function testByStringArray(): void
    {
        $this->assertSame(
            [
                '藍井すず',
                '藤宮めい',
                '橋本あみ',
            ],
            SnStringList::byStringArray([
                '藍井すず',
                '藤宮めい',
                '橋本あみ',
            ])->toArray()
        );
    }
}
