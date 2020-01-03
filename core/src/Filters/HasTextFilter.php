<?php

namespace Zetgram\Filters;

use Zetgram\Types\Update;

class HasTextFilter implements FilterInterface
{

    public function check(Update $update, ...$params): bool
    {
        return isset($update->message->text);
    }
}
