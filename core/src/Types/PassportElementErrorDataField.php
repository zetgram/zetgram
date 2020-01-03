<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue in one of the data fields that was provided by the user. The error is
    considered resolved when the field's value changes.

Source: https://core.telegram.org/bots/api#passportelementerrordatafield
*/
class PassportElementErrorDataField extends PassportElementError
{
    /**
    * Error source, must be data
    * @var string
    */
    public string $source;

    /**
    * The section of the user's Telegram Passport which has the error, one of 'personal_details', 'passport',
    * 'driver_license', 'identity_card', 'internal_passport', 'address'
    * @var string
    */
    public string $type;

    /**
    * Name of the data field which has the error
    * @var string
    */
    public string $fieldName;

    /**
    * Base64-encoded data hash
    * @var string
    */
    public string $dataHash;

    /**
    * Error message
    * @var string
    */
    public string $message;

    protected function build(stdClass $data)
    {
        $this->source = $data->source;
        $this->type = $data->type;
        $this->fieldName = $data->field_name;
        $this->dataHash = $data->data_hash;
        $this->message = $data->message;
    }
}