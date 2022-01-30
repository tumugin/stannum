<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class IteratorAggregateTest extends TestCase
{
    public function testGetIterator(): void
    {
        $baseArray = [
            '橋本あみ',
            '工藤のか',
            '藍井すず',
            '七瀬れあ',
            '藤宮めい',
            '永堀ゆめ',
            '朝比奈れい',
        ];
        $testArray = SnList::byArray($baseArray);
        foreach ($testArray as $key => $value) {
            $this->assertSame($baseArray[$key], $value);
        }
    }
}
