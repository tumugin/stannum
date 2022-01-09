<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class ByStringTest extends TestCase
{
    public function testByStringWithValidValue(): void
    {
        $this->assertSame(100, SnInteger::byString('100')->toInt());
    }

    public function testByStringWithInvalidValue(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnInteger::byString('工藤のか')->toInt();
    }
}
