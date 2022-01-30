<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnList\SnFloatList;

class ByArrayTest extends TestCase
{
    public function testByArray(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::byArray([
                SnFloat::byFloat(1.1),
                SnFloat::byFloat(2.2),
                SnFloat::byFloat(3.3),
            ])
                ->map(fn(SnFloat $SnFloat) => $SnFloat->toFloat())
                ->toArray()
        );
    }

    public function testByArrayStrict(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::byArrayStrict([
                SnFloat::byFloat(1.1),
                SnFloat::byFloat(2.2),
                SnFloat::byFloat(3.3),
            ])
                ->map(fn(SnFloat $SnFloat) => $SnFloat->toFloat())
                ->toArray()
        );
    }

    public function testByArrayStrictWithType(): void
    {
        $this->assertSame(
            [1.1, 2.2, 3.3],
            SnFloatList::byArrayStrictWithType(
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
    public function testByArrayErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::byArray($fromValue);
    }

    /**
     * @dataProvider providesErrorCases
     */
    public function testByArrayStrictErrorCase(array $fromValue): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::byArrayStrict($fromValue);
    }

    /**
     * @dataProvider providesErrorCasesWithType
     */
    public function testByArrayStrictWithTypeErrorCase(array $fromValue, string $type): void
    {
        $this->expectException(AssertionFailedException::class);
        SnFloatList::byArrayStrictWithType($fromValue, $type);
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
