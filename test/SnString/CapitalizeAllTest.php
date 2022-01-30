<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class CapitalizeAllTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $testString, string $expected): void
    {
        $actual = SnString::byString($testString)->capitalizeAll()->toString();
        $this->assertSame($expected, $actual);
    }

    public function provideTestStrings(): array
    {
        return [
            ['', ''],
            ['SUZU', 'SUZU'],
            ['suzu', 'SUZU'],
            ['Suzu', 'SUZU'],
            ['藍井すず(aoi suzu)', '藍井すず(AOI SUZU)'],
        ];
    }
}
