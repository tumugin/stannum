<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

class SnString
{
    protected string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $value): SnString
    {
        Assertion::same(mb_detect_encoding($value), 'UTF-8', 'Value must be valid UTF-8 string.');
        return new SnString($value);
    }

    public static function fromInt(int $value): SnString
    {
        return new SnString("{$value}");
    }

    public static function fromFloat(float $value): SnString
    {
        return new SnString("{$value}");
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function length(): SnInteger
    {
        return SnInteger::byInt(mb_strlen($this->value));
    }

    public function equals(SnString $value): bool
    {
        return $this->value === $value->value;
    }

    public function concat(SnString $value): SnString
    {
        return new SnString($this->value . $value->value);
    }

    public function contains(SnString $value): bool
    {
        return mb_strpos($this->value, $value->value) !== false;
    }

    public function isAsciiOnly(): bool
    {
        return mb_check_encoding($this->value, 'ASCII');
    }

    public function bytes(): SnList
    {
        return SnList::fromArrayStrict(array_values(unpack('C*', $this->value)));
    }

    public function capitalizeFirst(): SnString
    {
        $firstChar = mb_substr($this->value, 0, 1);
        $then = mb_substr($this->value, 1, null);
        return new SnString(mb_strtoupper($firstChar) . $then);
    }

    public function capitalizeAll(): SnString
    {
        return new SnString(mb_strtoupper($this->value));
    }

    public function downcaseAll(): SnString
    {
        return new SnString(mb_strtolower($this->value));
    }

    public function chars(): SnList
    {
        return SnList::fromArrayStrict(mb_str_split($this->value));
    }

    public function trim(): SnString
    {
        return new SnString(preg_replace('/\A[\x00\s]++|[\x00\s]++\z/u', '', $this->value));
    }

    public function isEmpty(): bool
    {
        return $this->value === '';
    }

    public function endsWith(SnString $needle): bool
    {
        return mb_substr($this->value, -mb_strlen($needle->value)) === $needle->value;
    }

    public function startsWith(SnString $needle): bool
    {
        return mb_strpos($this->value, $needle->value) === 0;
    }

    public function replace(SnString $search, SnString $replace): SnString
    {
        return new SnString(str_replace($search->value, $replace->value, $this->value));
    }

    public function pregReplace(SnString $regex, SnString $replace): SnString
    {
        return new SnString(preg_replace($regex->value, $replace->value, $this->value));
    }
}
