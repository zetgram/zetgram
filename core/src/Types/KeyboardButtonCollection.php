<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class KeyboardButtonCollection extends Collection
{
    public function current(): ?KeyboardButton
    {
        return parent::current();
    }

    public function offsetGet($offset): ?KeyboardButton
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof KeyboardButton) {
            throw new InvalidArgumentException('Value must be instance of ' . KeyboardButton::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new KeyboardButton($item);
        }
    }
}