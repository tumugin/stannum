<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ToStringTest extends TestCase
{
    public function testToString(): void
    {
        $this->assertSame('藍井すず', SnString::byString('藍井すず')->toString());
    }

    public function testPHPToString(): void
    {
        $snString = SnString::byString('藍井すず');
        $this->assertSame('藍井すず', "{$snString}");
    }
}
