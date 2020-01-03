<?php

namespace Zetgram\Filters;

use Zetgram\Types\Update;
use InvalidArgumentException;

class TextEqualFilter implements FilterInterface
{

    public function check(Update $update, ...$params): bool
    {
        if (!isset($params[0]))
            throw new InvalidArgumentException('Text required');

        $text = $params[0];

        if(!isset($update->message->text))
            return false;

        return $text === $update->message->text;
    }
}
