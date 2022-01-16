<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class FromArrayTest extends TestCase
{
    public function testFromArray(): void
    {
        $testSnString = SnString::fromString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::fromArray($testSnStringArray);
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testFromArrayErrorCase(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::fromArray(['藍井すず']);
    }
}
