<?php

namespace Zetgram\Handlers;

use Zetgram\Types\Update;

interface UpdateHandlerInterface
{
    /**
     * @param $update Update
     */
    public function handle(Update $update);
}
