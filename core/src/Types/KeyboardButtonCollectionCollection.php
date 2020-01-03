<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class KeyboardButtonCollectionCollection extends Collection
{
    public function current(): ?KeyboardButtonCollection
    {
        return parent::current();
    }

    public function offsetGet($offset): ?KeyboardButtonCollection
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof KeyboardButtonCollection) {
            throw new InvalidArgumentException('Value must be instance of ' . KeyboardButtonCollection::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new KeyboardButtonCollection($item);
        }
    }
}