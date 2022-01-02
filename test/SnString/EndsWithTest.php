<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class EndsWithTest extends TestCase
{
    /**
     * @dataProvider provideStrings
     */
    public function testWithStrings(string $testString, string $needleString, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnString::fromString($testString)->endsWith(SnString::fromString($needleString))
        );
    }

    public function provideStrings(): array
    {
        return [
            ['', '', true],
            ['藤宮めい', 'めい', true],
            ['めいめい', 'めい', true],
            ['藤宮めい', '藤宮', false],
        ];
    }
}
