<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;

/**
 * Wrapper class of string value
 */
class SnString
{
    protected string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Returns native string value.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * Creates SnString instance by native string value.
     *
     * @param string $value Base value
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

    /**
     * Creates SnString instance by integer value.
     *
     * @param int $value Base value
     */
    public static function fromInt(int $value): self
    {
        return new static("{$value}");
    }

    /**
     * Creates SnString instance by float value.
     *
     * @param float $value Base value
     */
    public static function fromFloat(float $value): self
    {
        return new static("{$value}");
    }

    /**
     * Returns native string value.
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * Returns the length of string.
     */
    public function length(): SnInteger
    {
        return SnInteger::byInt(mb_strlen($this->value));
    }

    /**
     * Returns specified value is same as it.
     *
     * @param SnString $value Value compared with it
     */
    public function equals(self $value): bool
    {
        return $this->value === $value->value;
    }

    /**
     * Concat specified value and return new SnString instance.
     *
     * @param SnString $value Value to be combined
     */
    public function concat(self $value): self
    {
        return new static($this->value . $value->value);
    }

    /**
     * Returns whether the specified value is included or not.
     *
     * @param SnString $needle Value to search for
     */
    public function contains(self $needle): bool
    {
        // workaround: PHP7.4 with empty needle will return error
        if ($needle->value === '') {
            return true;
        }

        return mb_strpos($this->value, $needle->value) !== false;
    }

    /**
     * Returns whether the string contains only ASCII characters.
     */
    public function isAsciiOnly(): bool
    {
        return mb_check_encoding($this->value, 'ASCII');
    }

    /**
     * Convert a string to a byte array
     *
     * @throws AssertionFailedException
     */
    public function bytes(): SnList
    {
        return SnList::fromArrayStrict(array_values(unpack('C*', $this->value)));
    }

    /**
     * Returns a string with the first letter changed to uppercase.
     */
    public function capitalizeFirst(): self
    {
        $firstChar = mb_substr($this->value, 0, 1);
        $then = mb_substr($this->value, 1, null);
        return new static(mb_strtoupper($firstChar) . $then);
    }

    /**
     * Returns a string with all characters changed to uppercase.
     */
    public function capitalizeAll(): self
    {
        return new static(mb_strtoupper($this->value));
    }

    /**
     * Returns a string with all characters changed to lowercase.
     */
    public function downcaseAll(): self
    {
        return new static(mb_strtolower($this->value));
    }

    /**
     * Returns an array of strings broken down into characters, one by one.
     *
     * @throws AssertionFailedException
     */
    public function chars(): SnList
    {
        return SnList::fromArrayStrict(mb_str_split($this->value));
    }

    /**
     * Trims and returns a string.
     */
    public function trim(): self
    {
        return new static(preg_replace('/\A[\x00\s]++|[\x00\s]++\z/u', '', $this->value));
    }

    /**
     * Returns whether the string is empty or not.
     */
    public function isEmpty(): bool
    {
        return $this->value === '';
    }

    /**
     * Returns whether or not the string ends with the specified character.
     *
     * @param SnString $needle String to be determined
     */
    public function endsWith(self $needle): bool
    {
        return mb_substr($this->value, -mb_strlen($needle->value)) === $needle->value;
    }

    /**
     * Returns whether or not the string starts with the specified string.
     *
     * @param SnString $needle String to be determined
     */
    public function startsWith(self $needle): bool
    {
        // workaround: PHP7.4 with empty needle will return error
        if ($needle->value === '') {
            return true;
        }

        return mb_strpos($this->value, $needle->value) === 0;
    }

    /**
     * Search for the specified string and replace it with the specified string.
     *
     * @param SnString $search String to search
     * @param SnString $replace String to be replaced
     */
    public function replace(self $search, self $replace): self
    {
        return new static(str_replace($search->value, $replace->value, $this->value));
    }

    /**
     * Search for strings with regular expressions and replace them with the specified strings.
     *
     * @param SnString $regex Regular expression to search
     * @param SnString $replace String to be replaced
     */
    public function pregReplace(self $regex, self $replace): self
    {
        return new static(preg_replace($regex->value, $replace->value, $this->value));
    }
}
