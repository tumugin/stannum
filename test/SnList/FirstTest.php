<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class FirstTest extends TestCase
{
    public function testFirst(): void
    {
        $this->assertSame('藍井すず', SnList::byArray(['藍井すず', '藤宮めい'])->first());
    }

    public function testWithEmptyList(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::byArray([])->first();
    }
}
