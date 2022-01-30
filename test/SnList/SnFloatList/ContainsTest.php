<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList\SnFloatList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnList\SnFloatList;

class ContainsTest extends TestCase
{
    public function testContainsTrue(): void
    {
        $this->assertTrue(
            SnFloatList::byFloatArray([1.1, 3.3, 2.2])
                ->contains(SnFloat::byFloat(3.3))
        );
    }

    public function testContainsFalse(): void
    {
        $this->assertFalse(
            SnFloatList::byFloatArray([1.1, 3.3, 2.2])
                ->contains(SnFloat::byFloat(100.4))
        );
    }
}
