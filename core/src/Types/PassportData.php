<?php

namespace Zetgram\Types;

use stdClass;

/*
Contains information about Telegram Passport data shared with the bot by the user.

Source: https://core.telegram.org/bots/api#passportdata
*/
class PassportData extends Base
{
    /**
    * Array with information about documents and other Telegram Passport elements that was shared with the bot
    * @var EncryptedPassportElementCollection
    */
    public EncryptedPassportElementCollection $data;

    /**
    * Encrypted credentials required to decrypt the data
    * @var EncryptedCredentials
    */
    public EncryptedCredentials $credentials;

    protected function build(stdClass $data)
    {
        $this->data = new EncryptedPassportElementCollection($data->data);
        $this->credentials = new EncryptedCredentials($data->credentials);
    }
}