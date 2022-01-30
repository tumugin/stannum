<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class ByArrayStrictWithTypeTest extends TestCase
{
    public function testByArrayStrictWithType(): void
    {
        $testSnString = SnString::byString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::byArrayStrictWithType(
            $testSnStringArray,
            SnString::class
        );
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testByArrayStrictWithTypeWithWrongType(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::byArrayStrictWithType(
            [SnString::byString('藍井すず')],
            SnInteger::class
        );
    }

    public function testByArrayStrictWithTypeWithWrongArray(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::byArrayStrictWithType(
            ['藍井すず'],
            SnString::class
        );
    }
}
