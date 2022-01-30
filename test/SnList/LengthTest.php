<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class LengthTest extends TestCase
{
    public function testLength(): void
    {
        $this->assertSame(7, SnList::byArray([
            '橋本あみ',
            '工藤のか',
            '藍井すず',
            '七瀬れあ',
            '藤宮めい',
            '永堀ゆめ',
            '朝比奈れい',
        ])->length()->toInt());
    }
}
