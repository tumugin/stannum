<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class CharsTest extends TestCase
{
    /**
     * @param string[] $expected
     * @dataProvider provideStrings
     */
    public function testChars(string $testString, array $expected): void
    {
        $actual = SnString::byString($testString)->chars()->toArray();
        $this->assertSame($expected, $actual);
    }

    /**
     * @return array{0:string, 1:string[]}[]
     */
    public function provideStrings(): array
    {
        return [
            ['', []],
            ['藍井すず', ['藍', '井', 'す', 'ず']],
        ];
    }
}
