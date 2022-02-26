<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class TrimTest extends TestCase
{
    /**
     * @dataProvider provideStrings
     */
    public function testWithStrings(string $testString, string $expected): void
    {
        $this->assertSame($expected, SnString::byString($testString)->trim()->toString());
    }

    /**
     * @return array{0:string, 1:string}[]
     */
    public function provideStrings(): array
    {
        return [
            [' ', ''],
            ['　', ''],
            [' 藍井すず ', '藍井すず'],
            ['藍井すず は かわいい', '藍井すず は かわいい'],
            // String contains ZWJ sequences does not collapse
            ['🏳️‍🌈', '🏳️‍🌈'],
            ['虹🏳️‍🌈の コンキスタドール', '虹🏳️‍🌈の コンキスタドール'],
        ];
    }
}
