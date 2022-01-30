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

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $value): self
    {
        Assertion::inArray(
            mb_detect_encoding($value),
            ['UTF-8', 'ASCII'],
            'Value must be valid UTF-8 string.'
        );
        return new static($value);
    }

    public static function fromInt(int $value): self
    {
        return new static("{$value}");
    }

    public static function fromFloat(float $value): self
    {
        return new static("{$value}");
    }

    public function toString(): string
    {
        return $this->value;
    }

    public function length(): SnInteger
    {
        return SnInteger::byInt(mb_strlen($this->value));
    }

    public function equals(self $value): bool
    {
        return $this->value === $value->value;
    }

    public function concat(self $value): self
    {
        return new static($this->value . $value->value);
    }

    public function contains(self $needle): bool
    {
        // workaround: PHP7.4 with empty needle will return error
        if ($needle->value === '') {
            return true;
        }

        return mb_strpos($this->value, $needle->value) !== false;
    }

    public function isAsciiOnly(): bool
    {
        return mb_check_encoding($this->value, 'ASCII');
    }

    public function bytes(): SnList
    {
        return SnList::fromArrayStrict(array_values(unpack('C*', $this->value)));
    }

    public function capitalizeFirst(): self
    {
        $firstChar = mb_substr($this->value, 0, 1);
        $then = mb_substr($this->value, 1, null);
        return new static(mb_strtoupper($firstChar) . $then);
    }

    public function capitalizeAll(): self
    {
        return new static(mb_strtoupper($this->value));
    }

    public function downcaseAll(): self
    {
        return new static(mb_strtolower($this->value));
    }

    public function chars(): SnList
    {
        return SnList::fromArrayStrict(mb_str_split($this->value));
    }

    public function trim(): self
    {
        return new static(preg_replace('/\A[\x00\s]++|[\x00\s]++\z/u', '', $this->value));
    }

    public function isEmpty(): bool
    {
        return $this->value === '';
    }

    public function endsWith(self $needle): bool
    {
        return mb_substr($this->value, -mb_strlen($needle->value)) === $needle->value;
    }

    public function startsWith(self $needle): bool
    {
        // workaround: PHP7.4 with empty needle will return error
        if ($needle->value === '') {
            return true;
        }

        return mb_strpos($this->value, $needle->value) === 0;
    }

    public function replace(self $search, self $replace): self
    {
        return new static(str_replace($search->value, $replace->value, $this->value));
    }

    public function pregReplace(self $regex, self $replace): self
    {
        return new static(preg_replace($regex->value, $replace->value, $this->value));
    }
}
