<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class UserCollection extends Collection
{
    public function current(): ?User
    {
        return parent::current();
    }

    public function offsetGet($offset): ?User
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof User) {
            throw new InvalidArgumentException('Value must be instance of ' . User::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new User($item);
        }
    }
}