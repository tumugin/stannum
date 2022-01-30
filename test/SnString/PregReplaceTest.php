<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class PregReplaceTest extends TestCase
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
                ->pregReplace(SnString::byString($searchString), SnString::byString($replaceString))
                ->toString()
        );
    }

    public function provideStrings(): array
    {
        return [
            ['', '//u', '', ''],
            ['藤宮めい', '/藤宮/u', '', 'めい'],
            ['藤宮めい', '//u', '', '藤宮めい'],
            ['藍井すずはかわいい', '/かわいい/u', 'かっこいい', '藍井すずはかっこいい'],
        ];
    }
}
