<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnInteger;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnInteger;

class IsEqualTest extends TestCase
{
    public function testIsEqual(): void
    {
        $testSnInteger = SnInteger::byInt(100);
        $this->assertTrue(SnInteger::byInt(100)->isEqual($testSnInteger));
    }
}
