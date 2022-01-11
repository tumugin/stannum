<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class ToStringTest extends TestCase
{
    public function testPHPToString(): void
    {
        $snInteger = SnInteger::byInt(100);
        $this->assertSame("100", "{$snInteger}");
    }

    public function testToString(): void
    {
        $snInteger = SnInteger::byInt(100);
        $this->assertSame("100", $snInteger->toString());
    }
}
