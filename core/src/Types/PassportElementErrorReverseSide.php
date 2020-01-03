<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with the reverse side of a document. The error is considered resolved when
    the file with reverse side of the document changes.

Source: https://core.telegram.org/bots/api#passportelementerrorreverseside
*/
class PassportElementErrorReverseSide extends PassportElementError
{
    /**
    * Error source, must be reverse_side
    * @var string
    */
    public string $source;

    /**
    * The section of the user's Telegram Passport which has the issue, one of 'driver_license', 'identity_card'
    * @var string
    */
    public string $type;

    /**
    * Base64-encoded hash of the file with the reverse side of the document
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