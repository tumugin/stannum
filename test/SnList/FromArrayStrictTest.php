<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class FromArrayStrictTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $this->assertSame([], SnList::fromArrayStrict([])->toArray());
    }

    public function testWithStrictArray(): void
    {
        $this->assertSame([1, 2, 3], SnList::fromArrayStrict([1, 2, 3])->toArray());
    }

    public function testWithNotStrictArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::fromArrayStrict(['1', 2, 3])->toArray();
    }

    public function testWithNotScalarTypedArray(): void
    {
        $testObject = new FromArrayStrictTest();
        $this->assertSame(
            [$testObject, $testObject],
            SnList::fromArrayStrict([$testObject, $testObject])->toArray()
        );
    }
}
