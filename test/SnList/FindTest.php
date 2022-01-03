<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class FindTest extends TestCase
{
    public function testFind(): void
    {
        $this->assertSame(
            2,
            SnList::fromArray([1, 2, 3, 4, 5])
                ->find(fn(int $val) => $val % 2 === 0)
        );
    }

    public function testFindWithNullCase(): void
    {
        $this->assertNull(
            SnList::fromArray([1, 2, 3, 4, 5])
                ->find(fn(int $val) => $val % 10 === 0)
        );
    }
}
