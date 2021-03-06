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
            SnString::byString($initialString)->concat(
                SnString::byString($concatString)
            )->toString()
        );
    }

    /**
     * @return array{0:string, 1:string, 2:string}[]
     */
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
