<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class FilterTest extends TestCase
{
    public function testFilter(): void
    {
        $this->assertSame(
            [1, 3, 5],
            SnList::byArray(
                [1, 2, 3, 4, 5, 6]
            )
                ->filter(fn(int $val) => $val % 2 !== 0)
                ->toArray()
        );
    }
}
