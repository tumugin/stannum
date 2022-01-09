<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class CountableTest extends TestCase
{
    public function testCount(): void
    {
        $testArray = SnList::fromArray([
            '橋本あみ',
            '工藤のか',
            '藍井すず',
            '七瀬れあ',
            '藤宮めい',
            '永堀ゆめ',
            '朝比奈れい',
        ]);
        $this->assertSame(7, $testArray->count());
    }

    public function testWithStandardCount(): void
    {
        $testArray = SnList::fromArray([
            '橋本あみ',
            '工藤のか',
            '藍井すず',
            '七瀬れあ',
            '藤宮めい',
            '永堀ゆめ',
            '朝比奈れい',
        ]);
        $this->assertCount(7, $testArray);
    }
}
