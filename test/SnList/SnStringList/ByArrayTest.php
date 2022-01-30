<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class ByArrayTest extends TestCase
{
    public function testByArray(): void
    {
        $testSnString = SnString::byString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::byArray($testSnStringArray);
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testByArrayErrorCase(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::byArray(['藍井すず']);
    }
}
