<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class ConcatTest extends TestCase
{
    public function testWithEmptyArg(): void
    {
        $this->assertSame([], SnList::byArray([])->concat()->toArray());
    }

    public function testWithArray(): void
    {
        $this->assertSame(
            [1, 2, 3, 4, 5, 6, 7],
            SnList::byArray([1, 2, 3])
                ->concat(
                    SnList::byArray([4, 5]),
                    SnList::byArray([6, 7]),
                )
                ->toArray()
        );
    }
}
