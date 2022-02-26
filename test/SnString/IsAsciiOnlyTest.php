<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class IsAsciiOnlyTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $testString, bool $expected): void
    {
        $this->assertSame($expected, SnString::byString($testString)->isAsciiOnly());
    }

    /**
     * @return array{0:string, 1:bool}[]
     */
    public function provideTestStrings(): array
    {
        return [
            ["\x00", true],
            ["\x7F", true],
            ["\x5C", true],
            ["\x7E", true],
            ['藍井すず', false],
            ['Aoi Suzu', true],
        ];
    }
}
