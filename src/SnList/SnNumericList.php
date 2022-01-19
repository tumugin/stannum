<?php

declare(strict_types=1);

namespace Tumugin\Stannum\SnList;

use Tumugin\Stannum\SnFloat;
use Tumugin\Stannum\SnInteger;
use Tumugin\Stannum\SnList;

abstract class SnNumericList extends SnList
{
    /**
     * @return SnFloat|SnInteger
     */
    public function total()
    {
        $result = array_sum($this->toArray());
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    /**
     * @return SnFloat|SnInteger
     */
    public function average()
    {
        $result = array_sum($this->toArray()) / count($this->toArray());
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    /**
     * @return SnFloat|SnInteger
     */
    public function max()
    {
        $result = max($this->toArray());
        return $this->convertFloatOrIntegerToSnTypes($result);
    }

    public function min()
    {
        $result = min($this->toArray());
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
            case 'float':
                return SnFloat::byFloat($result);
            default:
                throw new \Exception('unhandled type.');
        }
    }
}
