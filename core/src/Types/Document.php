<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a general file (as opposed to photos, voice messages and audio files).

Source: https://core.telegram.org/bots/api#document
*/
class Document extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Document thumbnail as defined by sender
    * @var PhotoSize
    */
    public ?PhotoSize $thumb;

    /**
    * Original filename as defined by sender
    * @var string
    */
    public ?string $fileName;

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
        if (isset($data->thumb)) {
            $this->thumb = new PhotoSize($data->thumb);
        }
        if (isset($data->file_name)) {
            $this->fileName = $data->file_name;
        }
        if (isset($data->mime_type)) {
            $this->mimeType = $data->mime_type;
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}