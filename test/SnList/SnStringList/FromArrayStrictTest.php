<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class FromArrayStrictTest extends TestCase
{
    public function testFromArrayStrict(): void
    {
        $testSnString = SnString::fromString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::fromArrayStrict($testSnStringArray);
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testFromArrayStrictErrorCase(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::fromArrayStrict(['藍井すず']);
    }
}
