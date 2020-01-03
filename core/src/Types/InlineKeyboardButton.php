<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one button of an inline keyboard. You must use exactly one of the
    optional fields.

Source: https://core.telegram.org/bots/api#inlinekeyboardbutton
*/
class InlineKeyboardButton extends Base
{
    /**
    * Label text on the button
    * @var string
    */
    public string $text;

    /**
    * HTTP or tg:// url to be opened when button is pressed
    * @var string
    */
    public ?string $url;

    /**
    * An HTTP URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
    * @var LoginUrl
    */
    public ?LoginUrl $loginUrl;

    /**
    * Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
    * @var string
    */
    public ?string $callbackData;

    /**
    * If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the
    * bot�s username and the specified inline query in the input field. Can be empty, in which case just the bot�s
    * username will be inserted.
    * @var string
    */
    public ?string $switchInlineQuery;

    /**
    * If set, pressing the button will insert the bot�s username and the specified inline query in the current chat's
    * input field. Can be empty, in which case only the bot�s username will be inserted.
    * @var string
    */
    public ?string $switchInlineQueryCurrentChat;

    /**
    * Description of the game that will be launched when the user presses the button.
    * @var CallbackGame
    */
    public ?CallbackGame $callbackGame;

    /**
    * Specify True, to send a Pay button.
    * @var bool
    */
    public ?bool $pay;

    protected function build(stdClass $data)
    {
        $this->text = $data->text;
        if (isset($data->url)) {
            $this->url = $data->url;
        }
        if (isset($data->login_url)) {
            $this->loginUrl = new LoginUrl($data->login_url);
        }
        if (isset($data->callback_data)) {
            $this->callbackData = $data->callback_data;
        }
        if (isset($data->switch_inline_query)) {
            $this->switchInlineQuery = $data->switch_inline_query;
        }
        if (isset($data->switch_inline_query_current_chat)) {
            $this->switchInlineQueryCurrentChat = $data->switch_inline_query_current_chat;
        }
        if (isset($data->callback_game)) {
            $this->callbackGame = new CallbackGame($data->callback_game);
        }
        if (isset($data->pay)) {
            $this->pay = $data->pay;
        }
    }
}