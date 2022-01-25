<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class AverageTest extends TestCase
{
    public function testAverage(): void
    {
        $this->assertSame(
            2.5,
            SnIntegerList::fromIntArray([1, 2, 3, 4])
                ->average()
                ->toFloat()
        );
    }
}
