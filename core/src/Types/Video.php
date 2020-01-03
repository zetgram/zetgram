<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a video file.

Source: https://core.telegram.org/bots/api#video
*/
class Video extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Video width as defined by sender
    * @var int
    */
    public int $width;

    /**
    * Video height as defined by sender
    * @var int
    */
    public int $height;

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
    * Mime type of a file as defined by sender
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
        $this->width = $data->width;
        $this->height = $data->height;
        $this->duration = $data->duration;
        if (isset($data->thumb)) {
            $this->thumb = new PhotoSize($data->thumb);
        }
        if (isset($data->mime_type)) {
            $this->mimeType = $data->mime_type;
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}