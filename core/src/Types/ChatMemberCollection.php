<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class ChatMemberCollection extends Collection
{
    public function current(): ?ChatMember
    {
        return parent::current();
    }

    public function offsetGet($offset): ?ChatMember
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof ChatMember) {
            throw new InvalidArgumentException('Value must be instance of ' . ChatMember::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new ChatMember($item);
        }
    }
}