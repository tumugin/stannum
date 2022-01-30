<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class LengthTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $testString, int $expectedLength): void
    {
        $actual = SnString::byString($testString)->length()->toInt();
        $this->assertSame($expectedLength, $actual);
    }

    public function provideTestStrings(): array
    {
        return [
            // Empty string
            ['', 0],
            // ASCII only string
            ['ASCII', 5],
            // String without surrogate pair
            ['藍井すず', 4],
            // String with surrogate pair
            ['𠮟', 1],
            // String with emoji(not contains ZWJ sequences)
            ['🥴', 1],
            // String with emoji(contains ZWJ sequences)
            // NOTE: THIS API DOES NOT SUPPORT counting text correctly with ZWJ sequences
            ['😵‍💫	', 4],
        ];
    }
}
