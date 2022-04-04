<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class SplitTest extends TestCase
{
    public function testSplit(): void
    {
        $this->assertSame(
            ['藤宮めい', '藍井すず', '橋本あみ'],
            SnString::byString('藤宮めい,藍井すず,橋本あみ')
                ->split(SnString::byString(','))
                ->toStringArray()
        );
    }

    public function testSplitWithExtraComma(): void
    {
        $this->assertSame(
            ['藤宮めい', '藍井すず', '橋本あみ', ''],
            SnString::byString('藤宮めい,藍井すず,橋本あみ,')
                ->split(SnString::byString(','))
                ->toStringArray()
        );
    }
}
