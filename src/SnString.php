<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Tumugin\Stannum\SnList\SnStringList;

/**
 * Wrapper class of string value
 *
 * @extends SnBaseValue<string>
 */
class SnString extends SnBaseValue
{
    protected string $value;

    final protected function __construct(string $value)
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
     * @return static
     * @throws AssertionFailedException
     */
    public static function byString(string $value)
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
     * @return static
     */
    public static function byInt(int $value)
    {
        return new static("{$value}");
    }

    /**
     * Creates SnString instance by float value.
     *
     * @param float $value Base value
     * @return static
     */
    public static function byFloat(float $value)
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
     * @param SnString|string $value Value compared with it
     */
    public function equals($value): bool
    {
        $rawValue = is_string($value) ? $value : $value->value;
        return $this->value === $rawValue;
    }

    /**
     * Concat specified value and return new SnString instance.
     *
     * @param SnString|string $value Value to be combined
     * @return static
     */
    public function concat($value)
    {
        $rawValue = is_string($value) ? $value : $value->value;
        return new static($this->value . $rawValue);
    }

    /**
     * Returns whether the specified value is included or not.
     *
     * @param SnString|string $needle Value to search for
     */
    public function contains($needle): bool
    {
        $rawNeedleValue = is_string($needle) ? $needle : $needle->value;

        // workaround: PHP7.4 with empty needle will return error
        if ($rawNeedleValue === '') {
            return true;
        }

        return mb_strpos($this->value, $rawNeedleValue) !== false;
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
     * @return SnList<integer>
     * @throws AssertionFailedException
     */
    public function bytes(): SnList
    {
        $unpack_result = unpack('C*', $this->value);
        if ($unpack_result === false) {
            throw new \RuntimeException('SnString: unpack error occurred.');
        }

        return SnList::byArrayStrictWithType(array_values($unpack_result), 'integer');
    }

    /**
     * Returns a string with the first letter changed to uppercase.
     *
     * @return static
     */
    public function capitalizeFirst()
    {
        $firstChar = mb_substr($this->value, 0, 1);
        $then = mb_substr($this->value, 1, null);
        return new static(mb_strtoupper($firstChar) . $then);
    }

    /**
     * Returns a string with all characters changed to uppercase.
     *
     * @return static
     */
    public function capitalizeAll()
    {
        return new static(mb_strtoupper($this->value));
    }

    /**
     * Returns a string with all characters changed to lowercase.
     *
     * @return static
     */
    public function downcaseAll()
    {
        return new static(mb_strtolower($this->value));
    }

    /**
     * Returns an array of strings broken down into characters, one by one.
     *
     * @return SnList<string>
     * @throws AssertionFailedException
     */
    public function chars(): SnList
    {
        return SnList::byArrayStrictWithType(mb_str_split($this->value), 'string');
    }

    /**
     * Split string with specified separator
     *
     * @param SnString|string $separator The string to separete with
     * @throws AssertionFailedException
     */
    public function split($separator): SnStringList
    {
        $rawSeparatorValue = is_string($separator) ? $separator : $separator->value;
        if ($rawSeparatorValue === '') {
            throw new \RuntimeException('SnString: separator value must not be empty.');
        }
        return SnStringList::byStringArray(explode($rawSeparatorValue, $this->value));
    }

    /**
     * Trims and returns a string.
     *
     * @return static
     */
    public function trim()
    {
        $preg_replace_result = preg_replace('/\A[\x00\s]++|[\x00\s]++\z/u', '', $this->value);
        if ($preg_replace_result === null) {
            throw new \RuntimeException('SnString: preg_replace error occurred.');
        }

        return new static($preg_replace_result);
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
     * @param SnString|string $needle String to be determined
     */
    public function endsWith($needle): bool
    {
        $rawNeedleValue = is_string($needle) ? $needle : $needle->value;
        return mb_substr($this->value, -mb_strlen($rawNeedleValue)) === $rawNeedleValue;
    }

    /**
     * Returns whether or not the string starts with the specified string.
     *
     * @param SnString|string $needle String to be determined
     */
    public function startsWith($needle): bool
    {
        $rawNeedleValue = is_string($needle) ? $needle : $needle->value;

        // workaround: PHP7.4 with empty needle will return error
        if ($rawNeedleValue === '') {
            return true;
        }

        return mb_strpos($this->value, $rawNeedleValue) === 0;
    }

    /**
     * Search for the specified string and replace it with the specified string.
     *
     * @param SnString|string $search String to search
     * @param SnString|string $replace String to be replaced
     * @return static
     */
    public function replace($search, $replace)
    {
        $rawSearchValue = is_string($search) ? $search : $search->value;
        $rawReplaceValue = is_string($replace) ? $replace : $replace->value;

        return new static(str_replace($rawSearchValue, $rawReplaceValue, $this->value));
    }

    /**
     * Search for strings with regular expressions and replace them with the specified strings.
     *
     * @param SnString|string $regex Regular expression to search
     * @param SnString|string $replace String to be replaced
     * @return static
     */
    public function pregReplace($regex, $replace)
    {
        $rawRegexValue = is_string($regex) ? $regex : $regex->value;
        $rawReplaceValue = is_string($replace) ? $replace : $replace->value;

        $preg_replace_result = preg_replace($rawRegexValue, $rawReplaceValue, $this->value);
        if ($preg_replace_result === null) {
            throw new \RuntimeException('SnString: preg_replace error occurred.');
        }

        return new static($preg_replace_result);
    }

    /**
     * Search for string with regular expressions and returns matches or not.
     *
     * @param SnString|string $regex Regular expression to search
     */
    public function pregMatches($regex): bool
    {
        $rawRegexValue = is_string($regex) ? $regex : $regex->value;

        $preg_match_result = preg_match($rawRegexValue, $this->value);
        if ($preg_match_result === false) {
            throw new \RuntimeException('SnString: preg_match error occurred.');
        }

        return $preg_match_result === 1;
    }

    /**
     * Search for string with regular expressions and returns the result.
     *
     * @param SnString|string $regex Regular expression to search
     * @return SnPregMatchResult|null Will return null if nothing matches
     * @throws AssertionFailedException
     */
    public function pregMatchAll($regex): ?SnPregMatchResult
    {
        $rawRegexValue = is_string($regex) ? $regex : $regex->value;

        $result_array = [];
        $preg_match_result = preg_match($rawRegexValue, $this->value, $result_array);

        if ($preg_match_result === false) {
            throw new \RuntimeException('SnString: preg_match error occurred.');
        }

        if ($preg_match_result === 0) {
            return null;
        }

        $match_string = $result_array[0];
        unset($result_array[0]);

        return new SnPregMatchResult(
            SnString::byString($match_string),
            SnStringList::byStringArray($result_array)
        );
    }

    /**
     * Returns a substring that starts at the specified startIndex and continues to the end of the string.
     *
     * @param SnInteger $startIndex the start index
     * @param SnInteger $endLength the maximum length of the returned string
     * @return static
     */
    public function substring(SnInteger $startIndex, SnInteger $endLength)
    {
        return new static(
            mb_substr($this->value, $startIndex->toInt(), $endLength->toInt())
        );
    }

    /**
     * Returns a subsequence of this char sequence containing the first n characters from this char sequence.
     *
     * Will return the entire char sequence if this char sequence is shorter.
     *
     * @param SnInteger $n the length of string to take
     * @return static
     */
    public function take(SnInteger $n)
    {
        return new static(
            mb_substr($this->value, 0, $n->toInt())
        );
    }

    public function getRawValue(): string
    {
        return $this->value;
    }
}
