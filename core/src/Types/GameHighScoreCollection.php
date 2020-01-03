<?php

namespace Zetgram\Types;

use InvalidArgumentException;

class GameHighScoreCollection extends Collection
{
    public function current(): ?GameHighScore
    {
        return parent::current();
    }

    public function offsetGet($offset): ?GameHighScore
    {
        return parent::offsetGet($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof GameHighScore) {
            throw new InvalidArgumentException('Value must be instance of ' . GameHighScore::class);
        }
        parent::offsetSet($offset, $value);
    }

    protected function build(array $items)
    {
        foreach ($items as $item) {
            $this->items[] = new GameHighScore($item);
        }
    }
}