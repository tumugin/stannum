<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList\SnIntegerList;

class ContainsTest extends TestCase
{
    public function testContainsTrue(): void
    {
        $this->assertTrue(
            SnIntegerList::fromIntArray([1, 3, 2])
                ->contains(SnInteger::byInt(3))
        );
    }

    public function testContainsFalse(): void
    {
        $this->assertFalse(
            SnIntegerList::fromIntArray([1, 3, 2])
                ->contains(SnInteger::byInt(100))
        );
    }
}
