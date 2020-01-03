<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class PassportElementErrorCollection extends Collection
{
    public function current(): ?PassportElementError
    {
        return parent::current();
    }

    public function offsetGet($offset): ?PassportElementError
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof PassportElementError) {
            throw new InvalidArgumentException('Value must be instance of ' . PassportElementError::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new PassportElementError($item);
        }
    }
}