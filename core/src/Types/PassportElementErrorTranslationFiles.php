<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue with the translated version of a document. The error is considered
    resolved when a file with the document translation change.

Source: https://core.telegram.org/bots/api#passportelementerrortranslationfiles
*/
class PassportElementErrorTranslationFiles extends PassportElementError
{
    /**
    * Error source, must be translation_files
    * @var string
    */
    public string $source;

    /**
    * Type of element of the user's Telegram Passport which has the issue, one of 'passport', 'driver_license',
    * 'identity_card', 'internal_passport', 'utility_bill', 'bank_statement', 'rental_agreement',
    * 'passport_registration', 'temporary_registration'
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