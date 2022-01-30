<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnIntegerList;

class TotalTest extends TestCase
{
    public function testTotal(): void
    {
        $this->assertSame(
            10,
            SnIntegerList::byIntArray([5, 3, 2])->total()->toInt()
        );
    }
}
