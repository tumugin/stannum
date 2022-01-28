<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnList\SnFloatList;

class FromArrayTest extends TestCase
{
    public function testFromArray(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::fromArray([
                SnFloat::byFloat(1.1),
                SnFloat::byFloat(2.2),
                SnFloat::byFloat(3.3),
            ])
                ->map(fn(SnFloat $SnFloat) => $SnFloat->toFloat())
                ->toArray()
        );
    }

    public function testFromArrayStrict(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::fromArrayStrict([
                SnFloat::byFloat(1.1),
                SnFloat::byFloat(2.2),
                SnFloat::byFloat(3.3),
            ])
                ->map(fn(SnFloat $SnFloat) => $SnFloat->toFloat())
                ->toArray()
        );
    }

    public function testFromArrayStrictWithType(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::fromArrayStrictWithType(
                [
                    SnFloat::byFloat(1.1),
                    SnFloat::byFloat(2.2),
                    SnFloat::byFloat(3.3),
                ],
                SnFloat::class
            )
                ->map(fn(SnFloat $SnFloat) => $SnFloat->toFloat())
                ->toArray()
        );
    }

    /**
     * @dataProvider providesErrorCases
     */
    public function testFromArrayErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::fromArray($fromValue);
    }

    /**
     * @dataProvider providesErrorCases
     */
    public function testFromArrayStrictErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::fromArrayStrict($fromValue);
    }

    /**
     * @dataProvider providesErrorCasesWithType
     */
    public function testFromArrayStrictWithTypeErrorCase(array $fromValue, string $type): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::fromArrayStrictWithType($fromValue, $type);
    }

    public function providesErrorCases(): array
    {
        return [
            [
                [1.1, 2.2, 3.3],
            ],
            [
                ['1.1', '2.2', '3.3'],
            ],
        ];
    }

    public function providesErrorCasesWithType(): array
    {
        return [
            [
                [1.1, 2.2, 3.3],
                SnFloat::class,
            ],
            [
                ['1.1', '2.2', '3.3'],
                SnFloat::class,
            ],
            [
                [SnFloat::byFloat(1.1)],
                'string',
            ],
        ];
    }
}
