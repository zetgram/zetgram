<?php

namespace App\Handlers;

use Zetgram\ApiAbstract;
use Zetgram\Handlers\MessageHandler;
use Zetgram\ReplyKeyboard;
use Zetgram\Types\Message;

class StartHandler extends MessageHandler
{
    /**
     * @var ApiAbstract
     */
    private ApiAbstract $api;

    public function __construct(ApiAbstract $api)
    {
        $this->api = $api;
    }

    public function handleMessage(Message $message)
    {
        $keyboard = new ReplyKeyboard();
        $keyboard->addChunk(trans('menu.main'), 2);
        $this->api->sendMessage($message->chat->id, trans('welcome'), $keyboard);
    }
}
