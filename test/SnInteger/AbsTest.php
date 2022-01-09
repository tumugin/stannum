<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class AbsTest extends TestCase
{
    public function testAbs(): void
    {
        $this->assertSame(100, SnInteger::byInt(-100)->abs()->toInt());
    }
}
