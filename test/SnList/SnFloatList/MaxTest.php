<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnFloatList;

class MaxTest extends TestCase
{
    public function testMax(): void
    {
        $this->assertSame(
            100,
            SnFloatList::byFloatArray([1.1, 100.1, 10.1])->max()->toInt()
        );
    }
}
