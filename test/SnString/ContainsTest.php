<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ContainsTest extends TestCase
{
    /**
     * @dataProvider providesTestStrings
     */
    public function testWithStrings(string $initString, string $containsString, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnString::fromString($initString)->contains(SnString::fromString($containsString))
        );
    }

    public function providesTestStrings(): array
    {
        return [
            ['', '', true],
            ['藍井すず', '', true],
            ['藍井すずだよ～', 'すず', true],
            ['藤宮めいだよ～', 'すず', false],
        ];
    }
}
