<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use ArrayIterator;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Exception;

/**
 * Wrapper class of sequential array
 *
 * @template T
 * @implements \IteratorAggregate<int, T>
 * @implements \ArrayAccess<int, T>
 */
class SnList implements \Countable, \ArrayAccess, \IteratorAggregate
{
    /**
     * @var T[] $value
     */
    protected array $value;

    /**
     * internal: Creates instance by raw value.
     *
     * @param T[] $value
     */
    final protected function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * Creates SnList instance by native array.
     *
     * @param T[] $value Base array
     * @return static
     */
    public static function byArray(array $value)
    {
        return new static(array_values($value));
    }

    /**
     * Creates SnList instance by native array which includes single type.
     *
     * @param T[] $value Base array
     * @return static
     * @throws AssertionFailedException
     */
    public static function byArrayStrict(array $value)
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
     * @param T[] $value Base array
     * @param string $type type of value
     * @return static
     * @throws AssertionFailedException
     */
    public static function byArrayStrictWithType(array $value, string $type)
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
     *
     * @return T[]
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
     * @param SnList<T> ...$value
     * @return static
     */
    public function concat(self ...$value)
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
     * @return static
     */
    public function filter(callable $callback)
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
     * @return T
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
     * @return static
     */
    public function distinct()
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
     * @return T
     */
    public function last()
    {
        Assertion::minCount($this->value, 1, 'Array must contain at least 1 item to access last element.');
        return $this->value[count($this->value) - 1];
    }

    /**
     * Applies the callback to the elements
     *
     * @template X
     * @param callable(mixed): X $callback
     * @return static<X>
     */
    public function map(callable $callback)
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
     * @return static
     */
    public function sort(callable $callback)
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
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        if (!isset($this->value[$offset])) {
            throw new Exception('Index out of range.');
        }
        return $this->value[$offset];
    }

    /**
     * @param int $offset
     * @param T $value
     * @throws Exception
     */
    public function offsetSet($offset, $value): void
    {
        throw new Exception('Set is not allowed for immutable SnList.');
    }

    /**
     * @param int $offset
     * @throws Exception
     */
    public function offsetUnset($offset): void
    {
        throw new Exception('Unset is not allowed for immutable SnList.');
    }

    /**
     * @return ArrayIterator<int, T>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->value);
    }
}
