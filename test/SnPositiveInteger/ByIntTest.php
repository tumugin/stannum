<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnPositiveInteger;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnPositiveInteger;

class ByIntTest extends TestCase
{
    /**
     * @dataProvider providesIntSuccessCases
     */
    public function testByInt(int $testInt): void
    {
        $this->assertSame(
            $testInt,
            SnPositiveInteger::byInt($testInt)->toInt()
        );
    }

    public function providesIntSuccessCases(): array
    {
        return [
            [1],
            [100],
        ];
    }

    /**
     * @dataProvider providesIntErrorCases
     */
    public function testByIntErrorCase(int $testInt): void
    {
        $this->expectException(AssertionFailedException::class);
        SnPositiveInteger::byInt($testInt)->toInt();
    }

    public function providesIntErrorCases(): array
    {
        return [
            [-100],
            [-1],
            [0],
        ];
    }
}
