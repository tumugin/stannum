<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\IntegrationTest;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnString;

class ListFunctionsTest extends TestCase
{
    public function testWithStringListFunctions(): void
    {
        $result = SnString::byString(
            'read_list,read_list,write_list,'
        )->split(SnString::byString(','))
            ->filter(fn(SnString $v) => !$v->isEmpty())
            ->map(fn(SnString $v) => $v->capitalizeAll())
            ->toSnStringList()
            ->distinct()
            ->joinToString(SnString::byString("\n"))
            ->toString();

        $this->assertSame(
            "READ_LIST\nWRITE_LIST",
            $result
        );
    }
}
