<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnFloat;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;

class FloorTest extends TestCase
{
    public function testFloor(): void
    {
        $this->assertSame(10.0, SnFloat::byFloat(10.6)->floor()->toFloat());
    }
}
