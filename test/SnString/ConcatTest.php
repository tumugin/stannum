<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ConcatTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testWithStrings(string $initialString, string $concatString, string $expected): void
    {
        $this->assertSame(
            $expected,
            SnString::fromString($initialString)->concat(
                SnString::fromString($concatString)
            )->toString()
        );
    }

    public function provideTestStrings(): array
    {
        return [
            ['藍井すず', 'はかわいい', '藍井すずはかわいい'],
            ['', '', ''],
            ['', '藍井すず', '藍井すず'],
            ['藍井すず', '', '藍井すず'],
        ];
    }
}
