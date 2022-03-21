<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnString;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class PregMatchesTest extends TestCase
{
    public function testPregMatchesTrueCase(): void
    {
        $testString = SnString::byString('藍井すずだよぉ～～～');
        $testRegex = SnString::byString('/^(藍井すず|藤宮めい|橋本あみ)/u');
        $this->assertTrue(
            $testString->pregMatches($testRegex)
        );
    }

    public function testPregMatchesFalseCase(): void
    {
        $testString = SnString::byString('あおいすず、藍井すず。');
        $testRegex = SnString::byString('/^(藍井すず|藤宮めい|橋本あみ)/u');
        $this->assertFalse(
            $testString->pregMatches($testRegex)
        );
    }
}
