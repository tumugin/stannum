<?php

declare(strict_types=1);

namespace Tumugin\Stannum;

use ArrayIterator;
use Assert\Assertion;
use Assert\AssertionFailedException;
use Exception;

class SnList implements \Countable, \ArrayAccess, \IteratorAggregate
{
    protected array $value;

    protected function __construct(array $value)
    {
        $this->value = $value;
    }

    public static function fromArray(array $value): SnList
    {
        return new SnList(array_values($value));
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromArrayStrict(array $value): SnList
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

        return new SnList(array_values($value));
    }

    public function toArray(): array
    {
        return $this->value;
    }

    public function length(): SnInteger
    {
        return SnInteger::byInt(count($this->value));
    }

    public function concat(SnList ...$value): SnList
    {
        $mergedArray = [...$this->value];
        foreach ($value as $snList) {
            $mergedArray = [...$mergedArray, ...$snList->value];
        }
        return new SnList($mergedArray);
    }

    /**
     * @param callable(mixed): bool $callback
     */
    public function filter(callable $callback): SnList
    {
        return new SnList(
            array_values(
                array_filter($this->value, $callback)
            )
        );
    }

    /**
     * @param callable(mixed): bool $callback
     */
    public function find(callable $callback)
    {
        return array_values(
            array_filter($this->value, $callback)
        )[0] ?? null;
    }

    /**
     * @throws AssertionFailedException
     */
    public function get(int $index)
    {
        Assertion::keyIsset($this->value, $index);

        return $this->value[$index];
    }

    public function getOrNull(int $index)
    {
        return $this->value[$index] ?? null;
    }

    public function isEmpty(): bool
    {
        return count($this->value) === 0;
    }

    public function contains($needle): bool
    {
        return in_array($needle, $this->value, true);
    }

    public function distinct(): SnList
    {
        return new SnList(
            array_values(
                array_unique($this->value)
            )
        );
    }

    /**
     * @throws AssertionFailedException
     */
    public function first()
    {
        Assertion::minCount($this->value, 1, 'Array must contain at least 1 item to access first element.');
        return $this->value[0];
    }

    /**
     * @throws AssertionFailedException
     */
    public function last()
    {
        Assertion::minCount($this->value, 1, 'Array must contain at least 1 item to access last element.');
        return $this->value[count($this->value) - 1];
    }

    /**
     * @param callable(mixed): mixed $callback
     */
    public function map(callable $callback): SnList
    {
        return new SnList(
            array_values(
                array_map($callback, $this->value)
            )
        );
    }

    /**
     * @param callable(mixed): mixed $callback
     */
    public function sort(callable $callback): SnList
    {
        $shallowCopyOfArray = $this->value;
        usort($shallowCopyOfArray, $callback);
        return new SnList($shallowCopyOfArray);
    }

    public function count(): int
    {
        return $this->length()->toInt();
    }

    public function offsetExists($offset): bool
    {
        return isset($this->value[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->value[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        throw new Exception('Set is now allow for immutable SnList.');
    }

    public function offsetUnset($offset)
    {
        throw new Exception('Unset is now allow for immutable SnList.');
    }

    public function getIterator()
    {
        return new ArrayIterator($this->value);
    }
}
