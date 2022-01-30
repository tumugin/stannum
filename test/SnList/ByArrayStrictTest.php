<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class ByArrayStrictTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $this->assertSame([], SnList::byArrayStrict([])->toArray());
    }

    public function testWithStrictArray(): void
    {
        $this->assertSame([1, 2, 3], SnList::byArrayStrict([1, 2, 3])->toArray());
    }

    public function testWithNotStrictArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::byArrayStrict(['1', 2, 3])->toArray();
    }

    public function testWithNotScalarTypedArray(): void
    {
        $testObject = new ByArrayStrictTest();
        $this->assertSame(
            [$testObject, $testObject],
            SnList::byArrayStrict([$testObject, $testObject])->toArray()
        );
    }
}
