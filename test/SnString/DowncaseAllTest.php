<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class DowncaseAllTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $testString, string $expected): void
    {
        $actual = SnString::byString($testString)->downcaseAll()->toString();
        $this->assertSame($expected, $actual);
    }

    public function provideTestStrings(): array
    {
        return [
            ['', ''],
            ['suzu', 'suzu'],
            ['Suzu', 'suzu'],
            ['SUZU', 'suzu'],
            ['藍井すず(AOI SUZU)', '藍井すず(aoi suzu)'],
        ];
    }
}
