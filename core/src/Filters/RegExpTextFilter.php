<?php

namespace Zetgram\Filters;

use Zetgram\Types\Update;

class RegExpTextFilter implements FilterInterface
{
    public function check(Update $update, ...$params): bool
    {
        return $this->privateCheck($update, ...$params);
    }

    private function privateCheck(Update $update, string $pattern, int $flags = 0) :bool
    {
        if(!isset($update->message->text))
            return false;

        $pattern = str_replace('#', '\\#', $pattern);
        $pattern = '#' . $pattern . '#';

        return preg_match($pattern, $update->message->text, $matches, $flags);
    }
}
