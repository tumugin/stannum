<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class IsOddTest extends TestCase
{
    /**
     * @dataProvider providesIntegers
     */
    public function testIsOdd(int $testInt, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnInteger::byInt($testInt)->isOdd()
        );
    }

    /**
     * @return array{0:int, 1:bool}[]
     */
    public function providesIntegers(): array
    {
        return [
            [1, true],
            [2, false],
            [3, true],
        ];
    }
}
