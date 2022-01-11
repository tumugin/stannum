<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnNegativeInteger;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnNegativeInteger;

class ByIntTest extends TestCase
{
    /**
     * @dataProvider providesIntSuccessCases
     */
    public function testByInt(int $testInt): void
    {
        $this->assertSame(
            $testInt,
            SnNegativeInteger::byInt($testInt)->toInt()
        );
    }

    public function providesIntSuccessCases(): array
    {
        return [
            [-1],
            [-100],
        ];
    }

    /**
     * @dataProvider providesIntErrorCases
     */
    public function testByIntErrorCase(int $testInt): void
    {
        $this->expectException(AssertionFailedException::class);
        SnNegativeInteger::byInt($testInt)->toInt();
    }

    public function providesIntErrorCases(): array
    {
        return [
            [100],
            [1],
            [0],
        ];
    }
}
