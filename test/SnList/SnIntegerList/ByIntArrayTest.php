<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class ByIntArrayTest extends TestCase
{
    public function testByIntArray(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::byIntArray([1, 2, 3])->toIntArray()
        );
    }

    public function testWrongTypeArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::byIntArray(['藍井すず', 1, 2, 3]);
    }
}
