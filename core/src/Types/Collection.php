<?php

namespace Zetgram\Types;

use ArrayAccess;
use Countable;
use Iterator;

class Collection implements Iterator, ArrayAccess, Countable
{
    protected int $position;

    protected array $items = [];

    public function __construct(array $items = [])
    {
        $this->position = 0;
        $this->build($items);
    }

    protected function build(array $items)
    {
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function next() :void
    {
        ++$this->position;
    }

    public function key() :int
    {
        return $this->position;
    }

    public function valid() :bool
    {
        return isset($this->items[$this->position]);
    }

    public function rewind() :void
    {
        $this->position = 0;
    }

    public function offsetExists($offset) :bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    public function offsetSet($offset, $value) :void
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset) :void
    {
        unset($this->items[$offset]);
    }

    public function count()
    {
        return count($this->items);
    }

    public function last()
    {
        return $this->items[$this->count() - 1] ?? null;
    }
}
