<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one special entity in a text message. For example, hashtags, usernames,
    URLs, etc.

Source: https://core.telegram.org/bots/api#messageentity
*/
class MessageEntity extends Base
{
    /**
    * Type of the entity. Can be mention (@username), hashtag, cashtag, bot_command, url, email, phone_number, bold
    * (bold text), italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text
    * URLs), text_mention (for users without usernames)
    * @var string
    */
    public string $type;

    /**
    * Offset in UTF-16 code units to the start of the entity
    * @var int
    */
    public int $offset;

    /**
    * Length of the entity in UTF-16 code units
    * @var int
    */
    public int $length;

    /**
    * For 'text_link' only, url that will be opened after user taps on the text
    * @var string
    */
    public ?string $url;

    /**
    * For 'text_mention' only, the mentioned user
    * @var User
    */
    public ?User $user;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->offset = $data->offset;
        $this->length = $data->length;
        if (isset($data->url)) {
            $this->url = $data->url;
        }
        if (isset($data->user)) {
            $this->user = new User($data->user);
        }
    }
}