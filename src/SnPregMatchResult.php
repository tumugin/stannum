<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Tumugin\Stannum\SnList\SnStringList;

class SnPregMatchResult
{
    private SnString $match;
    private SnStringList $matchGroups;

    /**
     * Creates SnPregMatchResult
     */
    public function __construct(SnString $match, SnStringList $matchGroups)
    {
        $this->match = $match;
        $this->matchGroups = $matchGroups;
    }

    /**
     * Returns the full match text.
     */
    public function getMatch(): SnString
    {
        return $this->match;
    }

    /**
     * Returns all match group texts.
     */
    public function getMatchGroups(): SnStringList
    {
        return $this->matchGroups;
    }
}
