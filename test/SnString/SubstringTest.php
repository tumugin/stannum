<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnString;

class SubstringTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testSubstring(string $expected, string $testString, int $startIndex, int $endLength): void
    {
        $this->assertSame(
            $expected,
            SnString::byString($testString)
                ->substring(SnInteger::byInt($startIndex), SnInteger::byInt($endLength))
                ->toString()
        );
    }

    public function provideTestStrings(): array
    {
        return [
            ['藍井', '藍井すず', 0, 2],
            ['', '藍井すず', 0, 0],
            ['', '', 0, 0],
            ['藍井すず', '藍井すず', 0, 100],
        ];
    }
}
