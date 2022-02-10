<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class JoinToStringTest extends TestCase
{
    public function testJoinToString(): void
    {
        $this->assertSame(
            '藍井すず,藤宮めい,橋本あみ',
            SnStringList::byStringArray([
                '藍井すず',
                '藤宮めい',
                '橋本あみ',
            ])
                ->joinToString(SnString::byString(','))
                ->toString()
        );
    }

    public function testJoinToStringWithEmptyArray(): void
    {
        $this->assertSame(
            '',
            SnStringList::byArray([])
                ->joinToString(SnString::byString(''))
                ->toString()
        );
    }
}
