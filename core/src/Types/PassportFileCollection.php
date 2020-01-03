<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class PassportFileCollection extends Collection
{
    public function current(): ?PassportFile
    {
        return parent::current();
    }

    public function offsetGet($offset): ?PassportFile
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof PassportFile) {
            throw new InvalidArgumentException('Value must be instance of ' . PassportFile::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new PassportFile($item);
        }
    }
}