<?php
declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class FromStringTest extends TestCase
{
    public function testWithValidUTF8String()
    {
        $snString = SnString::fromString('藍井すず');
        $this->assertSame('藍井すず', $snString->toString());
    }

    public function testAssertionWithInvalidUTF8String()
    {
        $this->expectException(AssertionFailedException::class);
        SnString::fromString("\x97\x95\x88\xe4\x82\xb7\x82\xb8");
    }
}
