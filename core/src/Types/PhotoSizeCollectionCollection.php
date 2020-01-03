<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class PhotoSizeCollectionCollection extends Collection
{
    public function current(): ?PhotoSizeCollection
    {
        return parent::current();
    }

    public function offsetGet($offset): ?PhotoSizeCollection
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof PhotoSizeCollection) {
            throw new InvalidArgumentException('Value must be instance of ' . PhotoSizeCollection::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new PhotoSizeCollection($item);
        }
    }
}