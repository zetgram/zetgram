<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a parameter of the inline keyboard button used to automatically
    authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is
    coming from Telegram. All the user needs to do is tap/click a button and confirm that they
    want to log in:
    Telegram apps support these buttons as of version 5.7.
    Sample bot: @discussbot

Source: https://core.telegram.org/bots/api#loginurl
*/
class LoginUrl extends Base
{
    /**
    * An HTTP URL to be opened with user authorization data added to the query string when the button is pressed. If
    * the user refuses to provide authorization data, the original URL without information about the user will be
    * opened. The data added is the same as described in Receiving authorization data.
    * @var string
    */
    public string $url;

    /**
    * New text of the button in forwarded messages.
    * @var string
    */
    public ?string $forwardText;

    /**
    * Username of a bot, which will be used for user authorization. See Setting up a bot for more details. If not
    * specified, the current bot's username will be assumed. The url's domain must be the same as the domain linked
    * with the bot. See Linking your domain to the bot for more details.
    * @var string
    */
    public ?string $botUsername;

    /**
    * Pass True to request the permission for your bot to send messages to the user.
    * @var bool
    */
    public ?bool $requestWriteAccess;

    protected function build(stdClass $data)
    {
        $this->url = $data->url;
        if (isset($data->forward_text)) {
            $this->forwardText = $data->forward_text;
        }
        if (isset($data->bot_username)) {
            $this->botUsername = $data->bot_username;
        }
        if (isset($data->request_write_access)) {
            $this->requestWriteAccess = $data->request_write_access;
        }
    }
}