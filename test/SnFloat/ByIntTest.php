<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnFloat;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;

class ByIntTest extends TestCase
{
    public function testByInt(): void
    {
        $this->assertSame(100.0, SnFloat::byInt(100)->toFloat());
    }
}
