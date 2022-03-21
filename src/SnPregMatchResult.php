<?php

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

    public function getMatch(): SnString
    {
        return $this->match;
    }

    public function getMatchGroups(): SnStringList
    {
        return $this->matchGroups;
    }
}
