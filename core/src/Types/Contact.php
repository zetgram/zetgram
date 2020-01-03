<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a phone contact.

Source: https://core.telegram.org/bots/api#contact
*/
class Contact extends Base
{
    /**
    * Contact's phone number
    * @var string
    */
    public string $phoneNumber;

    /**
    * Contact's first name
    * @var string
    */
    public string $firstName;

    /**
    * Contact's last name
    * @var string
    */
    public ?string $lastName;

    /**
    * Contact's user identifier in Telegram
    * @var int
    */
    public ?int $userId;

    /**
    * Additional data about the contact in the form of a vCard
    * @var string
    */
    public ?string $vcard;

    protected function build(stdClass $data)
    {
        $this->phoneNumber = $data->phone_number;
        $this->firstName = $data->first_name;
        if (isset($data->last_name)) {
            $this->lastName = $data->last_name;
        }
        if (isset($data->user_id)) {
            $this->userId = $data->user_id;
        }
        if (isset($data->vcard)) {
            $this->vcard = $data->vcard;
        }
    }
}