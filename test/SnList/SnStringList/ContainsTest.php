<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnStringList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList\SnStringList;
use Tumugin\Stannum\SnString;

class ContainsTest extends TestCase
{
    /**
     * @dataProvider providesTestArray
     */
    public function testContains(bool $expected, SnStringList $testSnStringList, SnString $needle): void
    {
        $this->assertSame(
            $expected,
            $testSnStringList->contains($needle)
        );
    }

    /**
     * @return array{0:bool, 1:SnStringList, 2:SnString}[]
     */
    public function providesTestArray(): array
    {
        return [
            [
                true,
                SnStringList::byArray([
                    SnString::byString('藍井すず'),
                    SnString::byString('藤宮めい'),
                ]),
                SnString::byString('藍井すず'),
            ],
            [
                false,
                SnStringList::byArray([
                    SnString::byString('藍井すず'),
                    SnString::byString('藤宮めい'),
                ]),
                SnString::byString('工藤のか'),
            ]
        ];
    }
}
