<?php

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class IsEmptyTest extends TestCase
{
    /**
     * @dataProvider provideStrings
     */
    public function testWithStrings(string $testString, bool $expected): void
    {
        $this->assertSame($expected, SnString::byString($testString)->isEmpty());
    }

    public function provideStrings(): array
    {
        return [
            ['', true],
            [' ', false],
            ['藍井すず', false],
        ];
    }
}
