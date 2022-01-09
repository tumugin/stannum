<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnFloat;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;

class ByStringTest extends TestCase
{
    public function testByString(): void
    {
        $this->assertSame(10.5, SnFloat::byString('10.5')->toFloat());
    }

    public function testByStringWithInvalidValue(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloat::byString('工藤のか')->toInt();
    }
}
