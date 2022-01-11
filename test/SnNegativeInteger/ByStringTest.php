<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnNegativeInteger;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnNegativeInteger;

class ByStringTest extends TestCase
{
    /**
     * @dataProvider providesSuccessCaseStrings
     */
    public function testByString(string $testString, int $expected): void
    {
        $this->assertSame(
            $expected,
            SnNegativeInteger::byString($testString)->toInt()
        );
    }

    /**
     * @dataProvider providesErrorCaseStrings
     */
    public function testByStringWithErrorCase(string $testString): void
    {
        $this->expectException(AssertionFailedException::class);
        SnNegativeInteger::byString($testString)->toInt();
    }

    public function providesErrorCaseStrings(): array
    {
        return [
            ['0'],
            ['100'],
            ['藍井すず'],
        ];
    }

    public function providesSuccessCaseStrings(): array
    {
        return [
            ['-1', -1],
            ['-100', -100],
        ];
    }
}
