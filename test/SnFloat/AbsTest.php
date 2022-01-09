<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnFloat;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;

class AbsTest extends TestCase
{
    public function testAbs(): void
    {
        $this->assertSame(10.5, SnFloat::byFloat(-10.5)->abs()->toFloat());
    }
}
