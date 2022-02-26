<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class StartsWithTest extends TestCase
{
    /**
     * @dataProvider provideStrings
     */
    public function testWithStrings(string $testString, string $needleString, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnString::byString($testString)->startsWith(SnString::byString($needleString))
        );
    }

    /**
     * @return array{0:string, 1:string, 2:bool}[]
     */
    public function provideStrings(): array
    {
        return [
            ['', '', true],
            ['藤宮めい', 'めい', false],
            ['めいめい', 'めい', true],
            ['藤宮めい', '藤宮', true],
        ];
    }
}
