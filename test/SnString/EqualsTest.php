<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class EqualsTest extends TestCase
{
    public function testEquals(): void
    {
        $this->assertTrue(
            SnString::fromString('藍井すず')->equals(SnString::fromString('藍井すず'))
        );
    }
}
