<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnFloatList;

class AverageTest extends TestCase
{
    public function testAverage(): void
    {
        $this->assertSame(
            2.75,
            SnFloatList::byFloatArray([1.1, 2.2, 3.3, 4.4])
                ->average()
                ->toFloat()
        );
    }
}
