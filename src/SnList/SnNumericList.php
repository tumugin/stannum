<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnInteger;

abstract class SnNumericList extends SnBaseValueArray
{
    /**
     * @return SnFloat|SnInteger
     */
    public function total()
    {
        $result = array_sum(
            $this
                ->map(fn($v) => get_class($v) === SnFloat::class ? $v->toFloat() : $v->toInt())
                ->toArray()
        );
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    /**
     * @return SnFloat|SnInteger
     */
    public function average()
    {
        $sum = array_sum(
            $this
                ->map(fn($v) => get_class($v) === SnFloat::class ? $v->toFloat() : $v->toInt())
                ->toArray()
        );
        $result = (float)$sum / count($this->toArray());
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    /**
     * @return SnFloat|SnInteger
     */
    public function max()
    {
        $result = max(
            $this
                ->map(fn($v) => get_class($v) === SnFloat::class ? $v->toFloat() : $v->toInt())
                ->toArray()
        );
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    public function min()
    {
        $result = min(
            $this
                ->map(fn($v) => get_class($v) === SnFloat::class ? $v->toFloat() : $v->toInt())
                ->toArray()
        );
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    /**
     * @param integer|float $result
     * @return SnFloat|SnInteger
     */
    private function convertFloatOrIntegerToSnTypes($result)
    {
        switch (gettype($result)) {
            case 'integer':
                return SnInteger::byInt($result);
            case 'double':
                return SnFloat::byFloat($result);
            // @codeCoverageIgnoreStart
            default:
                throw new \Exception('unhandled type.');
            // @codeCoverageIgnoreEnd
        }
    }
}
