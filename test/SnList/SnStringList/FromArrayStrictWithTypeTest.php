<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class FromArrayStrictWithTypeTest extends TestCase
{
    public function testFromArrayStrictWithType(): void
    {
        $testSnString = SnString::fromString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::fromArrayStrictWithType(
            $testSnStringArray,
            SnString::class
        );
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testFromArrayStrictWithTypeWithWrongType(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::fromArrayStrictWithType(
            [SnString::fromString('藍井すず')],
            SnInteger::class
        );
    }

    public function testFromArrayStrictWithTypeWithWrongArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::fromArrayStrictWithType(
            ['藍井すず'],
            SnString::class
        );
    }
}
