<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with a list of scans. The error is considered resolved when the list of
    files containing the scans changes.

Source: https://core.telegram.org/bots/api#passportelementerrorfiles
*/
class PassportElementErrorFiles extends PassportElementError
{
    /**
    * Error source, must be files
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
    * List of base64-encoded file hashes
    * @var StringCollection
    */
    public StringCollection $fileHashes;

    /**
    * Error message
    * @var string
    */
    public string $message;

    protected function build(stdClass $data)
    {
        $this->source = $data->source;
        $this->type = $data->type;
        $this->fileHashes = new StringCollection($data->file_hashes);
        $this->message = $data->message;
    }
}