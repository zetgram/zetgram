<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents an issue in an unspecified place. The error is considered resolved when new data is
    added.

Source: https://core.telegram.org/bots/api#passportelementerrorunspecified
*/
class PassportElementErrorUnspecified extends PassportElementError
{
    /**
    * Error source, must be unspecified
    * @var string
    */
    public string $source;

    /**
    * Type of element of the user's Telegram Passport which has the issue
    * @var string
    */
    public string $type;

    /**
    * Base64-encoded element hash
    * @var string
    */
    public string $elementHash;

    /**
    * Error message
    * @var string
    */
    public string $message;

    protected function build(stdClass $data)
    {
        $this->source = $data->source;
        $this->type = $data->type;
        $this->elementHash = $data->element_hash;
        $this->message = $data->message;
    }
}