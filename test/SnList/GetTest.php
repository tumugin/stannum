<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class GetTest extends TestCase
{
    public function testGet(): void
    {
        $testList = SnList::byArray([
            '藍井すず',
            '藤宮めい',
            '橋本あみ',
        ]);
        $this->assertSame('藤宮めい', $testList->get(1));
    }

    public function testGetWithOutOfIndex(): void
    {
        $this->expectException(AssertionFailedException::class);
        $testList = SnList::byArray([
            '藍井すず',
            '藤宮めい',
            '橋本あみ',
        ]);
        $testList->get(4);
    }
}
