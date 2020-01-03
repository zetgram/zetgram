<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with the selfie with a document. The error is considered resolved when the
    file with the selfie changes.

Source: https://core.telegram.org/bots/api#passportelementerrorselfie
*/
class PassportElementErrorSelfie extends PassportElementError
{
    /**
    * Error source, must be selfie
    * @var string
    */
    public string $source;

    /**
    * The section of the user's Telegram Passport which has the issue, one of 'passport', 'driver_license',
    * 'identity_card', 'internal_passport'
    * @var string
    */
    public string $type;

    /**
    * Base64-encoded hash of the file with the selfie
    * @var string
    */
    public string $fileHash;

    /**
    * Error message
    * @var string
    */
    public string $message;

    protected function build(stdClass $data)
    {
        $this->source = $data->source;
        $this->type = $data->type;
        $this->fileHash = $data->file_hash;
        $this->message = $data->message;
    }
}