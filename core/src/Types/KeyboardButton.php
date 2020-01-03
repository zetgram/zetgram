<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one button of the reply keyboard. For simple text buttons String can be
    used instead of this object to specify text of the button. Optional fields are mutually
    exclusive.
    Note: request_contact and request_location options will only work in Telegram versions
    released after 9 April, 2016. Older clients will ignore them.

Source: https://core.telegram.org/bots/api#keyboardbutton
*/
class KeyboardButton extends Base
{
    /**
    * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is
    * pressed
    * @var string
    */
    public string $text;

    /**
    * If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats
    * only
    * @var bool
    */
    public ?bool $requestContact;

    /**
    * If True, the user's current location will be sent when the button is pressed. Available in private chats only
    * @var bool
    */
    public ?bool $requestLocation;

    protected function build(stdClass $data)
    {
        $this->text = $data->text;
        if (isset($data->request_contact)) {
            $this->requestContact = $data->request_contact;
        }
        if (isset($data->request_location)) {
            $this->requestLocation = $data->request_location;
        }
    }
}