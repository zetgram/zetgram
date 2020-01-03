<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class InlineKeyboardButtonCollection extends Collection
{
    public function current(): ?InlineKeyboardButton
    {
        return parent::current();
    }

    public function offsetGet($offset): ?InlineKeyboardButton
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof InlineKeyboardButton) {
            throw new InvalidArgumentException('Value must be instance of ' . InlineKeyboardButton::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new InlineKeyboardButton($item);
        }
    }
}