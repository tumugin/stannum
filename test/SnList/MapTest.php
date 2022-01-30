<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class MapTest extends TestCase
{
    public function testMap(): void
    {
        $testArray = SnList::byArray([
            '橋本あみ',
            '工藤のか',
            '藍井すず',
            '七瀬れあ',
            '藤宮めい',
            '永堀ゆめ',
            '朝比奈れい',
        ]);
        $mappedArray = $testArray
            ->map(fn(string $item) => mb_strlen($item))
            ->toArray();
        $this->assertSame([4, 4, 4, 4, 4, 4, 5], $mappedArray);
    }
}
