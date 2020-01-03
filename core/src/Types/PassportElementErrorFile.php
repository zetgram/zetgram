<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with a document scan. The error is considered resolved when the file with
    the document scan changes.

Source: https://core.telegram.org/bots/api#passportelementerrorfile
*/
class PassportElementErrorFile extends PassportElementError
{
    /**
    * Error source, must be file
    * @var string
    */
    public string $source;

    /**
    * The section of the user's Telegram Passport which has the issue, one of 'utility_bill', 'bank_statement',
    * 'rental_agreement', 'passport_registration', 'temporary_registration'
    * @var string
    */
    public string $type;

    /**
    * Base64-encoded file hash
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