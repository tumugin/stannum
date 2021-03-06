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
            SnString::byString($testString)
                ->replace(SnString::byString($searchString), SnString::byString($replaceString))
                ->toString()
        );
    }

    /**
     * @return array{0:string, 1:string, 2:string, 3:string}[]
     */
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
