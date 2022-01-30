<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ByFloatTest extends TestCase
{
    public function testWithNormalFloat(): void
    {
        $snString = SnString::byFloat(1.12345);
        $this->assertSame('1.12345', $snString->toString());
    }
}
