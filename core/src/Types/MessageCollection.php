<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class MessageCollection extends Collection
{
    public function current(): ?Message
    {
        return parent::current();
    }

    public function offsetGet($offset): ?Message
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Message) {
            throw new InvalidArgumentException('Value must be instance of ' . Message::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new Message($item);
        }
    }
}