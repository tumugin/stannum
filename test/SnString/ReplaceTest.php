<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ReplaceTest extends TestCase
{
    /**
     * @dataProvider provideStrings
     */
    public function testWithStrings(
        string $testString,
        string $searchString,
        string $replaceString,
        string $expected
    ): void {
        $this->assertSame(
            $expected,
            SnString::fromString($testString)
                ->replace(SnString::fromString($searchString), SnString::fromString($replaceString))
                ->toString()
        );
    }

    public function provideStrings(): array
    {
        return [
            ['', '', '', ''],
            ['藤宮めい', '藤宮', '', 'めい'],
            ['藤宮めい', '', '', '藤宮めい'],
            ['藍井すずはかわいい', 'かわいい', 'かっこいい', '藍井すずはかっこいい'],
        ];
    }
}
