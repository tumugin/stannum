<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\SnList;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnList;

class SortTest extends TestCase
{
    public function testSort(): void
    {
        $testArray = SnList::byArray([3, 4, 1, 2, 5]);
        $sortedArray = $testArray->sort(fn(int $a, int $b) => $a - $b)->toArray();
        $this->assertSame([1, 2, 3, 4, 5], $sortedArray);
    }
}
