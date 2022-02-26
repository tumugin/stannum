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
     * @param mixed[] $testArray
     * @dataProvider provideErrorCase
     */
    public function testWithErrorCase(array $testArray, string $expectedType): void
    {
        $this->expectException(AssertionFailedException::class);
        SnList::byArrayStrictWithType($testArray, $expectedType);
    }

    /**
     * @return array{0:mixed[], 1:string}[]
     */
    public function provideErrorCase(): array
    {
        return [
            [['藤宮めい'], 'integer'],
            [['藤宮めい'], SnString::class],
        ];
    }

    /**
     * @param mixed[] $testArray
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

    /**
     * @return array{0:mixed[], 1:string}[]
     */
    public function provideSuccessfulCase(): array
    {
        return [
            [[], 'string'],
            [['藤宮めい'], 'string'],
            [[SnString::byString('藤宮めい')], SnString::class],
        ];
    }
}
