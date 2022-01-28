<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnFloatList;
use Tumugin\Stannum\SnList\SnIntegerList;

class TotalTest extends TestCase
{
    public function testTotal(): void
    {
        $this->assertSame(
            10.299999999999999,
            SnFloatList::fromFloatArray([5.1, 3.1, 2.1])->total()->toFloat()
        );
    }
}
