<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents an inline keyboard that appears right next to the message it belongs
    to.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will display unsupported message.

Source: https://core.telegram.org/bots/api#inlinekeyboardmarkup
*/
class InlineKeyboardMarkup extends Base
{
    /**
    * Array of button rows, each represented by an Array of InlineKeyboardButton objects
    * @var InlineKeyboardButtonCollectionCollection
    */
    public InlineKeyboardButtonCollectionCollection $inlineKeyboard;

    protected function build(stdClass $data)
    {
        $this->inlineKeyboard = new InlineKeyboardButtonCollectionCollection($data->inline_keyboard);
        return $this->inlineKeyboard;
    }
}