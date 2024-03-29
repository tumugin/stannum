<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class IsEmptyTest extends TestCase
{
    public function testIsEmptyWithEmptyArray(): void
    {
        $this->assertTrue(SnList::byArray([])->isEmpty());
    }

    public function testIsEmptyWithNotEmptyArray(): void
    {
        $this->assertFalse(SnList::byArray(['藍井すず'])->isEmpty());
    }
}
