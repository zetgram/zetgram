<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents an incoming callback query from a callback button in an inline
    keyboard. If the button that originated the query was attached to a message sent by the bot,
    the field message will be present. If the button was attached to a message sent via the bot
    (in inline mode), the field inline_message_id will be present. Exactly one of the fields data
    or game_short_name will be present.
    NOTE: After the user presses a callback button, Telegram clients will display a progress bar
    until you call answerCallbackQuery. It is, therefore, necessary to react by calling
    answerCallbackQuery even if no notification to the user is needed (e.g., without specifying
    any of the optional parameters).

Source: https://core.telegram.org/bots/api#callbackquery
*/
class CallbackQuery extends Base
{
    /**
    * Unique identifier for this query
    * @var string
    */
    public string $id;

    /**
    * Sender
    * @var User
    */
    public User $from;

    /**
    * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
    * Useful for high scores in games.
    * @var string
    */
    public string $chatInstance;

    /**
    * Message with the callback button that originated the query. Note that message content and message date will not
    * be available if the message is too old
    * @var Message
    */
    public ?Message $message;

    /**
    * Identifier of the message sent via the bot in inline mode, that originated the query.
    * @var string
    */
    public ?string $inlineMessageId;

    /**
    * Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field.
    * @var string
    */
    public ?string $data;

    /**
    * Short name of a Game to be returned, serves as the unique identifier for the game
    * @var string
    */
    public ?string $gameShortName;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->from = new User($data->from);
        $this->chatInstance = $data->chat_instance;
        if (isset($data->message)) {
            $this->message = new Message($data->message);
        }
        if (isset($data->inline_message_id)) {
            $this->inlineMessageId = $data->inline_message_id;
        }
        if (isset($data->data)) {
            $this->data = $data->data;
        }
        if (isset($data->game_short_name)) {
            $this->gameShortName = $data->game_short_name;
        }
    }
}