<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

abstract class SnBaseValue
{
    /**
     * @return mixed
     */
    abstract public function getRawValue();
}
