<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class EncryptedPassportElementCollection extends Collection
{
    public function current(): ?EncryptedPassportElement
    {
        return parent::current();
    }

    public function offsetGet($offset): ?EncryptedPassportElement
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof EncryptedPassportElement) {
            throw new InvalidArgumentException('Value must be instance of ' . EncryptedPassportElement::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new EncryptedPassportElement($item);
        }
    }
}