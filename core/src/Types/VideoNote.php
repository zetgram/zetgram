<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a video message (available in Telegram apps as of v.4.0).

Source: https://core.telegram.org/bots/api#videonote
*/
class VideoNote extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Video width and height (diameter of the video message) as defined by sender
    * @var int
    */
    public int $length;

    /**
    * Duration of the video in seconds as defined by sender
    * @var int
    */
    public int $duration;

    /**
    * Video thumbnail
    * @var PhotoSize
    */
    public ?PhotoSize $thumb;

    /**
    * File size
    * @var int
    */
    public ?int $fileSize;

    protected function build(stdClass $data)
    {
        $this->fileId = $data->file_id;
        $this->length = $data->length;
        $this->duration = $data->duration;
        if (isset($data->thumb)) {
            $this->thumb = new PhotoSize($data->thumb);
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}