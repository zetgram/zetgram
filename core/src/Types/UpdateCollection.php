<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class UpdateCollection extends Collection
{
    public function current(): ?Update
    {
        return parent::current();
    }

    public function offsetGet($offset): ?Update
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Update) {
            throw new InvalidArgumentException('Value must be instance of ' . Update::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new Update($item);
        }
    }
}