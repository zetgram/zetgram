<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class StringCollection extends Collection
{
    public function current(): ?String
    {
        return parent::current();
    }

    public function offsetGet($offset): ?String
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof String) {
            throw new InvalidArgumentException('Value must be instance of ' . String::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new String($item);
        }
    }
}