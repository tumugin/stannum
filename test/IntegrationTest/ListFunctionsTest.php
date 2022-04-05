<?php

declare(strict_types=1);

namespace Tumugin\Stannum\Test\IntegrationTest;

use PHPUnit\Framework\TestCase;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnInteger;
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

    public function testWithIntegerListFunctions(): void
    {
        $result = SnString::byString(
            '1,2,2,2,3,'
        )->split(SnString::byString(','))
            ->filter(fn(SnString $v) => !$v->isEmpty())
            ->map(fn(SnString $v) => SnInteger::byString($v->toString()))
            ->toSnIntegerList()
            ->distinct()
            ->toIntArray();

        $this->assertSame(
            [1, 2, 3],
            $result
        );
    }

    public function testWithFloatListFunctions(): void
    {
        $result = SnString::byString(
            '1.1,2.1,2.1,2.1,3.1,'
        )->split(SnString::byString(','))
            ->filter(fn(SnString $v) => !$v->isEmpty())
            ->map(fn(SnString $v) => SnFloat::byString($v->toString()))
            ->toSnFloatList()
            ->distinct()
            ->toFloatArray();

        $this->assertSame(
            [1.1, 2.1, 3.1],
            $result
        );
    }
}
