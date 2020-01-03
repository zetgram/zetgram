<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class InlineQueryResultCollection extends Collection
{
    public function current(): ?InlineQueryResult
    {
        return parent::current();
    }

    public function offsetGet($offset): ?InlineQueryResult
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof InlineQueryResult) {
            throw new InvalidArgumentException('Value must be instance of ' . InlineQueryResult::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new InlineQueryResult($item);
        }
    }
}