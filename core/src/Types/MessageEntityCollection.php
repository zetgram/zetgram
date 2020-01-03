<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class MessageEntityCollection extends Collection
{
    public function current(): ?MessageEntity
    {
        return parent::current();
    }

    public function offsetGet($offset): ?MessageEntity
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof MessageEntity) {
            throw new InvalidArgumentException('Value must be instance of ' . MessageEntity::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new MessageEntity($item);
        }
    }
}