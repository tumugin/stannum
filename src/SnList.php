<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use ArrayIterator;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Exception;

/**
 * Wrapper class of sequential array
 */
class SnList implements \Countable, \ArrayAccess, \IteratorAggregate
{
    protected array $value;

    /**
     * internal: Creates instance by raw value.
     */
    protected function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * Creates SnList instance by native array.
     *
     * @param array $value Base array
     */
    public static function fromArray(array $value): self
    {
        return new static(array_values($value));
    }

    /**
     * Creates SnList instance by native array which includes single type.
     *
     * @throws AssertionFailedException
     */
    public static function fromArrayStrict(array $value): self
    {
        $types = [];
        foreach ($value as $v) {
            if (gettype($v) === 'object') {
                $types[] = get_class($v);
                continue;
            }
            $types[] = gettype($v);
        }
        Assertion::true(
            count(array_unique($types)) <= 1,
            'Base array contains multiple types.'
        );

        return new static(array_values($value));
    }

    /**
     * Creates SnList instance by native array which includes only one specified type.
     *
     * @throws AssertionFailedException
     */
    public static function fromArrayStrictWithType(array $value, string $type): self
    {
        foreach ($value as $v) {
            if (gettype($v) === 'object') {
                $actualType = get_class($v);
            } else {
                $actualType = gettype($v);
            }

            Assertion::same($actualType, $type, "value in array must be type of {$type}");
        }

        return new static(array_values($value));
    }

    /**
     * Converts to native array.
     */
    public function toArray(): array
    {
        return $this->value;
    }

    /**
     * Returns length of list.
     */
    public function length(): SnInteger
    {
        return SnInteger::byInt(count($this->value));
    }

    /**
     * Concat with specified lists and return new SnList instance.
     *
     * @param SnList ...$value
     */
    public function concat(self ...$value): self
    {
        $mergedArray = [...$this->value];
        foreach ($value as $snList) {
            $mergedArray = [...$mergedArray, ...$snList->value];
        }
        return new static($mergedArray);
    }

    /**
     * Filter list
     *
     * @param callable(mixed): bool $callback
     */
    public function filter(callable $callback): self
    {
        return new static(
            array_values(
                array_filter($this->value, $callback)
            )
        );
    }

    /**
     * Find and return the first item or null.
     *
     * @param callable(mixed): bool $callback
     * @return null|mixed
     */
    public function find(callable $callback)
    {
        return array_values(array_filter($this->value, $callback))[0] ?? null;
    }

    /**
     * Returns the item of specified index.
     *
     * @param int $index index of item
     * @throws AssertionFailedException
     */
    public function get(int $index)
    {
        Assertion::keyIsset($this->value, $index);

        return $this->value[$index];
    }

    /**
     * Returns the item of specified index.
     *
     * If the index is out of range, will return null.
     *
     * @param int $index
     * @return mixed|null
     */
    public function getOrNull(int $index)
    {
        return $this->value[$index] ?? null;
    }

    /**
     * Returns the list is empty or not.
     */
    public function isEmpty(): bool
    {
        return count($this->value) === 0;
    }

    /**
     * Returns the value specified is included in list
     *
     * @param mixed $needle value to find in the list
     */
    public function contains($needle): bool
    {
        return in_array($needle, $this->value, true);
    }

    /**
     * Returns the unique list
     *
     * @return $this
     */
    public function distinct(): self
    {
        return new static(
            array_values(
                array_unique($this->value)
            )
        );
    }

    /**
     * Returns the first item
     *
     * @return mixed
     * @throws AssertionFailedException
     */
    public function first()
    {
        Assertion::minCount($this->value, 1, 'Array must contain at least 1 item to access first element.');
        return $this->value[0];
    }

    /**
     * Returns the last item
     *
     * @throws AssertionFailedException
     */
    public function last()
    {
        Assertion::minCount($this->value, 1, 'Array must contain at least 1 item to access last element.');
        return $this->value[count($this->value) - 1];
    }

    /**
     * Applies the callback to the elements
     *
     * @param callable(mixed): mixed $callback
     */
    public function map(callable $callback): self
    {
        return new static(
            array_values(
                array_map($callback, $this->value)
            )
        );
    }

    /**
     * Sorts the list
     *
     * NOTE: Callable arguments are same as usort.
     *
     * @param callable(mixed, mixed): mixed $callback
     */
    public function sort(callable $callback): self
    {
        $shallowCopyOfArray = $this->value;
        usort($shallowCopyOfArray, $callback);
        return new static($shallowCopyOfArray);
    }

    /**
     * Returns the length of list
     */
    public function count(): int
    {
        return $this->length()->toInt();
    }

    /**
     * Returns offset exists in list
     *
     * @param int $offset Offset value
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->value[$offset]);
    }

    /**
     * Returns the value of offset
     *
     * @param int $offset Offset value
     * @return mixed
     * @throws Exception
     */
    public function offsetGet($offset)
    {
        if (!isset($this->value[$offset])) {
            throw new Exception('Index out of range.');
        }
        return $this->value[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        throw new Exception('Set is not allowed for immutable SnList.');
    }

    public function offsetUnset($offset): void
    {
        throw new Exception('Unset is not allowed for immutable SnList.');
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->value);
    }
}
