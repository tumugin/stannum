<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ByIntTest extends TestCase
{
    public function testWithNormalInt(): void
    {
        $snString = SnString::byInt(20);
        $this->assertSame('20', $snString->toString());
    }
}
