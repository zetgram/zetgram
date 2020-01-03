<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a Telegram user or bot.

Source: https://core.telegram.org/bots/api#user
*/
class User extends Base
{
    /**
    * Unique identifier for this user or bot
    * @var int
    */
    public int $id;

    /**
    * True, if this user is a bot
    * @var bool
    */
    public bool $isBot;

    /**
    * User�s or bot�s first name
    * @var string
    */
    public string $firstName;

    /**
    * User�s or bot�s last name
    * @var string
    */
    public ?string $lastName;

    /**
    * User�s or bot�s username
    * @var string
    */
    public ?string $username;

    /**
    * IETF language tag of the user's language
    * @var string
    */
    public ?string $languageCode;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->isBot = $data->is_bot;
        $this->firstName = $data->first_name;
        if (isset($data->last_name)) {
            $this->lastName = $data->last_name;
        }
        if (isset($data->username)) {
            $this->username = $data->username;
        }
        if (isset($data->language_code)) {
            $this->languageCode = $data->language_code;
        }
    }
}