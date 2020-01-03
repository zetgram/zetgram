<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a Game.
    Note: This will only work in Telegram versions released after October 1, 2016. Older clients
    will not display any inline results if a game result is among them.

Source: https://core.telegram.org/bots/api#inlinequeryresultgame
*/
class InlineQueryResultGame extends InlineQueryResult
{
    /**
    * Type of the result, must be game
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * Short name of the game
    * @var string
    */
    public string $gameShortName;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->gameShortName = $data->game_short_name;
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
    }
}