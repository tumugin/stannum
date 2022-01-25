<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnIntegerList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList\SnIntegerList;

class FromArrayTest extends TestCase
{
    public function testFromArray(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::fromArray([
                SnInteger::byInt(1),
                SnInteger::byInt(2),
                SnInteger::byInt(3),
            ])
                ->map(fn(SnInteger $snInteger) => $snInteger->toInt())
                ->toArray()
        );
    }

    public function testFromArrayStrict(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::fromArrayStrict([
                SnInteger::byInt(1),
                SnInteger::byInt(2),
                SnInteger::byInt(3),
            ])
                ->map(fn(SnInteger $snInteger) => $snInteger->toInt())
                ->toArray()
        );
    }

    public function testFromArrayStrictWithType(): void
    {
        $this->assertSame(
            [1, 2, 3],
            SnIntegerList::fromArrayStrictWithType(
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
     * @dataProvider providesErrorCases
     */
    public function testFromArrayErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::fromArray($fromValue);
    }

    /**
     * @dataProvider providesErrorCases
     */
    public function testFromArrayStrictErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::fromArrayStrict($fromValue);
    }

    /**
     * @dataProvider providesErrorCasesWithType
     */
    public function testFromArrayStrictWithTypeErrorCase(array $fromValue, string $type): void
    {
        $this->expectException(AssertionFailedException::class);
        SnIntegerList::fromArrayStrictWithType($fromValue, $type);
    }

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
