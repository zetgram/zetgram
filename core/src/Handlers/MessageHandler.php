<?php

namespace Zetgram\Handlers;

use Zetgram\Types\Message;
use Zetgram\Types\Update;

abstract class MessageHandler implements UpdateHandlerInterface
{


    public function handle(Update $update)
    {
        $this->handleMessage($update->message);
    }

    abstract public function handleMessage(Message $message);
}
