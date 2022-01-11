<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class IsEvenTest extends TestCase
{
    /**
     * @dataProvider providesIntegers
     */
    public function testIsEven(int $testInt, bool $expected): void
    {
        $this->assertSame(
            $expected,
            SnInteger::byInt($testInt)->isEven()
        );
    }

    public function providesIntegers(): array
    {
        return [
            [1, false],
            [2, true],
            [3, false],
        ];
    }
}
