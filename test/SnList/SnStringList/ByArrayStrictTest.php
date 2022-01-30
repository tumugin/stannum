<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class ByArrayStrictTest extends TestCase
{
    public function testByArrayStrict(): void
    {
        $testSnString = SnString::byString('藍井すず');
        $testSnStringArray = [$testSnString];
        $snStringList = SnStringList::byArrayStrict($testSnStringArray);
        $this->assertSame($testSnStringArray, $snStringList->toArray());
    }

    public function testByArrayStrictErrorCase(): void
    {
        $this->expectException(AssertionFailedException::class);
        SnStringList::byArrayStrict(['藍井すず']);
    }
}
