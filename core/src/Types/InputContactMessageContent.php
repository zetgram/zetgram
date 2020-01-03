<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents the content of a contact message to be sent as the result of an inline query.

Source: https://core.telegram.org/bots/api#inputcontactmessagecontent
*/
class InputContactMessageContent extends InputMessageContent
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
    * Additional data about the contact in the form of a vCard, 0-2048 bytes
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
        if (isset($data->vcard)) {
            $this->vcard = $data->vcard;
        }
    }
}