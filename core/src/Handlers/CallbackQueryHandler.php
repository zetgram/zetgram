<?php

namespace Zetgram\Handlers;

use Zetgram\Types\CallbackQuery;
use Zetgram\Types\Update;

abstract class CallbackQueryHandler implements UpdateHandlerInterface
{

    public function handle(Update $update)
    {
        $this->handleCallbackQuery($update->callbackQuery);
    }

    abstract public function handleCallbackQuery(CallbackQuery $callbackQuery);
}
