<?php

namespace Zetgram\Filters;

use Zetgram\Types\Update;

interface FilterInterface
{
    public function check(Update $update, ...$params) : bool;
}
