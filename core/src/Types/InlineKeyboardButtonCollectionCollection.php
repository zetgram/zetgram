<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class InlineKeyboardButtonCollectionCollection extends Collection
{
    public function current(): ?InlineKeyboardButtonCollection
    {
        return parent::current();
    }

    public function offsetGet($offset): ?InlineKeyboardButtonCollection
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof InlineKeyboardButtonCollection) {
            throw new InvalidArgumentException('Value must be instance of ' . InlineKeyboardButtonCollection::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new InlineKeyboardButtonCollection($item);
        }
    }
}