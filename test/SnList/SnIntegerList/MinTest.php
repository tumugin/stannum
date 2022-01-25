<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class MinTest extends TestCase
{
    public function testMin(): void
    {
        $this->assertSame(
            10,
            SnIntegerList::fromIntArray([50, 10, 100])->min()->toInt()
        );
    }
}
