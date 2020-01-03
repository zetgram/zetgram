<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class PollOptionCollection extends Collection
{
    public function current(): ?PollOption
    {
        return parent::current();
    }

    public function offsetGet($offset): ?PollOption
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof PollOption) {
            throw new InvalidArgumentException('Value must be instance of ' . PollOption::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new PollOption($item);
        }
    }
}