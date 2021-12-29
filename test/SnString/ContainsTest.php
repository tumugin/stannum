<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ContainsTest extends TestCase
{
    /**
     * @dataProvider providesTestStrings
     */
    public function testWithStrings(SnString $initString, SnString $containsString, bool $expected): void
    {
        $this->assertSame($expected, $initString->contains($containsString));
    }

    public function providesTestStrings(): array
    {
        return [
            [SnString::fromString(''), SnString::fromString(''), true],
        ];
    }
}
