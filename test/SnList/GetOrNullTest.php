<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class GetOrNullTest extends TestCase
{
    public function testGet(): void
    {
        $testList = SnList::fromArray([
            '藍井すず',
            '藤宮めい',
            '橋本あみ',
        ]);
        $this->assertSame('藤宮めい', $testList->getOrNull(1));
    }

    public function testGetWithNullCase(): void
    {
        $testList = SnList::fromArray([
            '藍井すず',
            '藤宮めい',
            '橋本あみ',
        ]);
        $this->assertNull($testList->getOrNull(4));
    }
}
