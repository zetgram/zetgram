<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class PhotoSizeCollection extends Collection
{
    public function current(): ?PhotoSize
    {
        return parent::current();
    }

    public function offsetGet($offset): ?PhotoSize
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof PhotoSize) {
            throw new InvalidArgumentException('Value must be instance of ' . PhotoSize::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new PhotoSize($item);
        }
    }
}