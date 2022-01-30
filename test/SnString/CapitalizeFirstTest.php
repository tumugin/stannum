<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class CapitalizeFirstTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $testString, string $expected): void
    {
        $this->assertSame(
            $expected,
            SnString::byString($testString)->capitalizeFirst()->toString()
        );
    }

    public function provideTestStrings(): array
    {
        return [
            ['藍井', '藍井'],
            ['aoi', 'Aoi'],
            ['a', 'A'],
            ['', ''],
        ];
    }
}
