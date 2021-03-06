<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class PregMatchAllTest extends TestCase
{
    public function testPregMatchAll(): void
    {
        $testString = SnString::byString('藍井すずちゃんはかわいい');
        $matches = $testString->pregMatchAll(
            SnString::byString('/^(藍井すず).*(はかわいい)/u')
        );

        if ($matches === null) {
            throw new \RuntimeException('invalid condition.');
        }

        $this->assertSame(
            '藍井すずちゃんはかわいい',
            $matches->getMatch()->toString()
        );
        $this->assertSame(
            ['藍井すず', 'はかわいい'],
            $matches->getMatchGroups()->toStringArray()
        );
    }

    public function testPregMatchAllWithNoMatchCase(): void
    {
        $testString = SnString::byString('藍井すずちゃんはかっこいい');
        $matches = $testString->pregMatchAll(
            SnString::byString('/^(藍井すず).*(はかわいい)/u')
        );
        $this->assertNull($matches);
    }
}
