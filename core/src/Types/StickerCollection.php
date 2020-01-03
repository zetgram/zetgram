<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class StickerCollection extends Collection
{
    public function current(): ?Sticker
    {
        return parent::current();
    }

    public function offsetGet($offset): ?Sticker
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Sticker) {
            throw new InvalidArgumentException('Value must be instance of ' . Sticker::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new Sticker($item);
        }
    }
}