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

    public function providesTestArray(): array
    {
        return [
            [
                true,
                SnStringList::fromArray([
                    SnString::fromString('藍井すず'),
                    SnString::fromString('藤宮めい'),
                ]),
                SnString::fromString('藍井すず')
            ]
        ];
    }
}
