<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class LabeledPriceCollection extends Collection
{
    public function current(): ?LabeledPrice
    {
        return parent::current();
    }

    public function offsetGet($offset): ?LabeledPrice
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof LabeledPrice) {
            throw new InvalidArgumentException('Value must be instance of ' . LabeledPrice::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new LabeledPrice($item);
        }
    }
}