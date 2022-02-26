<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class IsLessThanTest extends TestCase
{
    /**
     * @dataProvider providesTestInteger
     */
    public function testIsLessThan(int $baseInt, int $comparedInt, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnInteger::byInt($baseInt)->isLessThan(SnInteger::byInt($comparedInt))
        );
    }

    /**
     * @return array{0:int, 1:int, 2:bool}[]
     */
    public function providesTestInteger(): array
    {
        return [
            [0, 100, true],
            [99, 100, true],
            [100, 100, false],
            [101, 100, false],
            [200, 100, false],
        ];
    }
}
