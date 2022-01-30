<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;
use Tumugin\Stannum\SnString;

class ByArrayStrictWithTypeTest extends TestCase
{
    /**
     * @dataProvider provideErrorCase
     */
    public function testWithErrorCase(array $testArray, string $expectedType): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::byArrayStrictWithType($testArray, $expectedType);
    }

    public function provideErrorCase(): array
    {
        return [
            [['藤宮めい'], 'integer'],
            [['藤宮めい'], SnString::class],
        ];
    }

    /**
     * @dataProvider provideSuccessfulCase
     */
    public function testWithSuccessfulCase(array $testArray, string $expectedType): void
    {
        $snList = SnList::byArrayStrictWithType($testArray, $expectedType);
        $this->assertCount(
            count($testArray),
            $snList->toArray()
        );
    }

    public function provideSuccessfulCase(): array
    {
        return [
            [[], 'string'],
            [['藤宮めい'], 'string'],
            [[SnString::byString('藤宮めい')], SnString::class],
        ];
    }
}