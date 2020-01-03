<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with the front side of a document. The error is considered resolved when
    the file with the front side of the document changes.

Source: https://core.telegram.org/bots/api#passportelementerrorfrontside
*/
class PassportElementErrorFrontSide extends PassportElementError
{
    /**
    * Error source, must be front_side
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
    * Base64-encoded hash of the file with the front side of the document
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