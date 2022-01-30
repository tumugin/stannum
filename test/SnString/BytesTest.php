<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class BytesTest extends TestCase
{
    public function testBytes(): void
    {
        $this->assertSame(
            [232, 151, 141, 228, 186, 149, 227, 129, 153, 227, 129, 154],
            SnString::byString('藍井すず')->bytes()->toArray()
        );
    }
}
