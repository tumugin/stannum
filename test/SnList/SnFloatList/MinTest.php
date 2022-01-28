<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnFloatList;
use Tumugin\Stannum\SnList\SnIntegerList;

class MinTest extends TestCase
{
    public function testMin(): void
    {
        $this->assertSame(
            10,
            SnFloatList::fromFloatArray([50.1, 10.1, 100.1])->min()->toInt()
        );
    }
}
