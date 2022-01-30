<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ByStringTest extends TestCase
{
    /**
     * @dataProvider provideTestValidUtf8Strings
     */
    public function testWithValidUtf8String(string $testString): void
    {
        $snString = SnString::byString($testString);
        $this->assertSame($testString, $snString->toString());
    }

    public function testAssertionWithInvalidUtf8String(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnString::byString("\x97\x95\x88\xe4\x82\xb7\x82\xb8");
    }

    public function provideTestValidUtf8Strings(): array
    {
        return [
            // Empty string(will be treated as ASCII but UTF8 compatible)
            [''],
            // ASCII only string(will be treated as ASCII compatible)
            ['ASCII'],
            // String without surrogate pair
            ['藍井すず'],
            // String with surrogate pair
            ['𠮟'],
            // String with emoji(not contains ZWJ sequences)
            ['🥴'],
            // String with emoji(contains ZWJ sequences)
            ['😵‍💫	'],
        ];
    }
}
