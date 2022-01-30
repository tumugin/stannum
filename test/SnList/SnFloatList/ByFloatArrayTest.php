<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnFloatList;

class ByFloatArrayTest extends TestCase
{
    public function testByIntArray(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFLoatList::byFloatArray([1.1, 2.2, 3.3])->toFloatArray()
        );
    }

    public function testWrongTypeArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFLoatList::byFloatArray(['藍井すず', 1.1, 2.2, 3.3]);
    }
}
