<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class MaxTest extends TestCase
{
    public function testMax(): void
    {
        $this->assertSame(
            100,
            SnIntegerList::byIntArray([1, 100, 10])->max()->toInt()
        );
    }
}
