<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class DistinctTest extends TestCase
{
    public function testDistinct(): void
    {
        $this->assertSame([1, 2, 3], SnList::byArray([1, 1, 2, 3, 3])->distinct()->toArray());
    }
}
