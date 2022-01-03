<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class FromArrayTest extends TestCase
{
    public function testWithEmptyArray(): void
    {
        $this->assertSame([], SnList::fromArray([])->toArray());
    }

    public function testWithListArray(): void
    {
        $this->assertSame(
            [
                '橋本あみ',
                '工藤のか',
                '藍井すず',
                '七瀬れあ',
                '藤宮めい',
                '永堀ゆめ',
                '朝比奈れい',
            ],
            SnList::fromArray([
                '橋本あみ',
                '工藤のか',
                '藍井すず',
                '七瀬れあ',
                '藤宮めい',
                '永堀ゆめ',
                '朝比奈れい',
            ])->toArray()
        );
    }

    public function testWithToothlessArray(): void
    {
        $this->assertSame(
            [
                '橋本あみ',
                '工藤のか',
                '藍井すず',
                '七瀬れあ',
                '藤宮めい',
                '永堀ゆめ',
                '朝比奈れい',
            ],
            SnList::fromArray([
                152 => '橋本あみ',
                168 => '工藤のか',
                156 => '藍井すず',
                153 => '七瀬れあ',
                149 => '藤宮めい',
                147 => '永堀ゆめ',
                154 => '朝比奈れい',
            ])->toArray()
        );
    }
}
