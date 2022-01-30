<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class LastTest extends TestCase
{
    public function testFirst(): void
    {
        $this->assertSame('藤宮めい', SnList::byArray(['藍井すず', '藤宮めい'])->last());
    }

    public function testWithEmptyList(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::byArray([])->first();
    }
}
