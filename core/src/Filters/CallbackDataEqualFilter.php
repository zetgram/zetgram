<?php

namespace Zetgram\Filters;

use Zetgram\Types\Update;
use InvalidArgumentException;

class CallbackDataEqualFilter implements FilterInterface
{
    public function check(Update $update, ...$params): bool
    {
        if(!isset($params[0]))
            throw new InvalidArgumentException('Callback data is required');

        if(!isset($update->callbackQuery->data))
            return false;

        return $params[0] === $update->callbackQuery->data;
    }
}
