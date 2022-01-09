<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnFloat;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;

class CeilTest extends TestCase
{
    public function testCeil(): void
    {
        $this->assertSame(11.0, SnFloat::byFloat(10.5)->ceil()->toFloat());
    }
}
