<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class ArrayAccessTest extends TestCase
{
    public function testOffsetExistsIfExists(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->assertTrue(isset($testArray[3]));
    }

    public function testOffsetExistsIfNotExists(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->assertFalse(isset($testArray[4]));
    }

    public function testOffsetGet(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->assertSame('d', $testArray[3]);
    }

    public function testOffsetGetOutOfRange(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->expectException(\Exception::class);
        $testArray[4];
    }

    public function testOffsetSet(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->expectException(\Exception::class);
        $testArray[1] = 'hoge';
    }

    public function testOffsetUnset(): void
    {
        $testArray = SnList::fromArray(['a', 'b', 'c', 'd']);
        $this->expectException(\Exception::class);
        unset($testArray[1]);
    }
}
