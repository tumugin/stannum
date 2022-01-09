<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class ContainsTest extends TestCase
{
    public function testContainsWithExistingItem(): void
    {
        $this->assertTrue(SnList::fromArray(['藍井すず'])->contains('藍井すず'));
    }

    public function testContainsWithNonExistingItem(): void
    {
        $this->assertFalse(SnList::fromArray(['藍井すず'])->contains('藤宮めい'));
    }
}
