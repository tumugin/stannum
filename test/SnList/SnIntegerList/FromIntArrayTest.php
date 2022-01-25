<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class FromIntArrayTest extends TestCase
{
    public function testFromIntArray()
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::fromIntArray([1, 2, 3])->toIntArray()
        );
    }

    public function testWrongTypeArray()
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::fromIntArray(['藍井すず', 1, 2, 3]);
    }
}
