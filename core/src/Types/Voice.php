<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a voice note.

Source: https://core.telegram.org/bots/api#voice
*/
class Voice extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Duration of the audio in seconds as defined by sender
    * @var int
    */
    public int $duration;

    /**
    * MIME type of the file as defined by sender
    * @var string
    */
    public ?string $mimeType;

    /**
    * File size
    * @var int
    */
    public ?int $fileSize;

    protected function build(stdClass $data)
    {
        $this->fileId = $data->file_id;
        $this->duration = $data->duration;
        if (isset($data->mime_type)) {
            $this->mimeType = $data->mime_type;
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}