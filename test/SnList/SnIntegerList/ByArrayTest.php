<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList\SnIntegerList;

class ByArrayTest extends TestCase
{
    public function testByArray(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::byArray([
                SnInteger::byInt(1),
                SnInteger::byInt(2),
                SnInteger::byInt(3),
            ])
                ->map(fn(SnInteger $snInteger) => $snInteger->toInt())
                ->toArray()
        );
    }

    public function testByArrayStrict(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::byArrayStrict([
                SnInteger::byInt(1),
                SnInteger::byInt(2),
                SnInteger::byInt(3),
            ])
                ->map(fn(SnInteger $snInteger) => $snInteger->toInt())
                ->toArray()
        );
    }

    public function testByArrayStrictWithType(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::byArrayStrictWithType(
                [
                    SnInteger::byInt(1),
                    SnInteger::byInt(2),
                    SnInteger::byInt(3),
                ],
                SnInteger::class
            )
                ->map(fn(SnInteger $snInteger) => $snInteger->toInt())
                ->toArray()
        );
    }

    /**
     * @param SnInteger[] $fromValue
     * @dataProvider providesErrorCases
     */
    public function testByArrayErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::byArray($fromValue);
    }

    /**
     * @param SnInteger[] $fromValue
     * @dataProvider providesErrorCases
     */
    public function testByArrayStrictErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::byArrayStrict($fromValue);
    }

    /**
     * @param SnInteger[] $fromValue
     * @dataProvider providesErrorCasesWithType
     */
    public function testByArrayStrictWithTypeErrorCase(array $fromValue, string $type): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::byArrayStrictWithType($fromValue, $type);
    }

    /**
     * @return array{0:int[]|string[]}[]
     */
    public function providesErrorCases(): array
    {
        return [
            [
                [1, 2, 3],
            ],
            [
                ['1', '2', '3'],
            ],
        ];
    }

    /**
     * @return array{0:int[]|string[]|SnInteger[], 1:string}[]
     */
    public function providesErrorCasesWithType(): array
    {
        return [
            [
                [1, 2, 3],
                SnInteger::class,
            ],
            [
                ['1', '2', '3'],
                SnInteger::class,
            ],
            [
                [SnInteger::byInt(1)],
                'string',
            ],
        ];
    }
}
