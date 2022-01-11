<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnPositiveInteger;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnPositiveInteger;

class ByStringTest extends TestCase
{
    /**
     * @dataProvider providesSuccessCaseStrings
     */
    public function testByString(string $testString, int $expected): void
    {
        $this->assertSame(
            $expected,
            SnPositiveInteger::byString($testString)->toInt()
        );
    }

    /**
     * @dataProvider providesErrorCaseStrings
     */
    public function testByStringWithErrorCase(string $testString): void
    {
        $this->expectException(AssertionFailedException::class);
        SnPositiveInteger::byString($testString)->toInt();
    }

    public function providesErrorCaseStrings(): array
    {
        return [
            ['0'],
            ['-100'],
            ['藍井すず'],
        ];
    }

    public function providesSuccessCaseStrings(): array
    {
        return [
            ['1', 1],
            ['100', 100],
        ];
    }
}
