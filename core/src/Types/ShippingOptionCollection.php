<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class ShippingOptionCollection extends Collection
{
    public function current(): ?ShippingOption
    {
        return parent::current();
    }

    public function offsetGet($offset): ?ShippingOption
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof ShippingOption) {
            throw new InvalidArgumentException('Value must be instance of ' . ShippingOption::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new ShippingOption($item);
        }
    }
}