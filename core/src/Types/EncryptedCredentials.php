<?php

namespace Zetgram\Types;

use stdClass;

/*
Contains data required for decrypting and authenticating EncryptedPassportElement. See the
    Telegram Passport Documentation for a complete description of the data decryption and
    authentication processes.

Source: https://core.telegram.org/bots/api#encryptedcredentials
*/
class EncryptedCredentials extends Base
{
    /**
    * Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required for
    * EncryptedPassportElement decryption and authentication
    * @var string
    */
    public string $data;

    /**
    * Base64-encoded data hash for data authentication
    * @var string
    */
    public string $hash;

    /**
    * Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
    * @var string
    */
    public string $secret;

    protected function build(stdClass $data)
    {
        $this->data = $data->data;
        $this->hash = $data->hash;
        $this->secret = $data->secret;
    }
}