<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class ConcatTest extends TestCase
{
    public function testWithEmptyArg(): void
    {
        $this->assertSame([], SnList::fromArray([])->concat()->toArray());
    }

    public function testWithArray(): void
    {
        $this->assertSame(
            [1, 2, 3, 4, 5, 6, 7],
            SnList::fromArray([1, 2, 3])
                ->concat(
                    SnList::fromArray([4, 5]),
                    SnList::fromArray([6, 7]),
                )
                ->toArray()
        );
    }
}
