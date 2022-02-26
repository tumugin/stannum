<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

/**
 * @template T
 */
abstract class SnBaseValue
{
    /**
     * @return T
     */
    abstract public function getRawValue();
}
