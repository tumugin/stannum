<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnString;

class TakeTest extends TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testTake(string $expected, string $testString, int $length): void
    {
        $this->assertSame(
            $expected,
            SnString::byString($testString)
                ->take(SnInteger::byInt($length))
                ->toString()
        );
    }

    /**
     * @return array{0:string, 1:string, 2:int}[]
     */
    public function provideTestStrings(): array
    {
        return [
            ['藍井すず', '藍井すず', 10],
            ['藍井', '藍井すず', 2],
            ['', '藍井すず', 0],
        ];
    }
}
