<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Exception;
use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnInteger;

/**
 * @template T of SnFloat|SnInteger
 * @extends SnBaseValueArray<T>
 */
abstract class SnNumericList extends SnBaseValueArray
{
    /**
     * Return the total value of the array
     *
     * @return SnFloat|SnInteger
     * @throws Exception
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
     * Return the average value of the array
     *
     * @return SnFloat|SnInteger
     * @throws Exception
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
     * Return the maximum value of the array
     *
     * @return SnFloat|SnInteger
     * @throws Exception
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

    /**
     * Return the minimum value of the array
     *
     * @return SnFloat|SnInteger
     * @throws Exception
     */
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
     * @throws Exception
     */
    private function convertFloatOrIntegerToSnTypes($result)
    {
        if (is_integer($result)) {
            return SnInteger::byInt($result);
        } elseif (is_float($result)) {
            return SnFloat::byFloat($result);
        }
        throw new \RuntimeException('unexpected type of $result');
    }
}
