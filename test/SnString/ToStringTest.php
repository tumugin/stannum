<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ToStringTest extends TestCase
{
    public function testToString()
    {
        $this->assertSame('藍井すず', SnString::fromString('藍井すず')->toString());
    }

    public function testPHPToString()
    {
        $snString = SnString::fromString('藍井すず');
        $this->assertSame('藍井すず', "{$snString}");
    }
}
