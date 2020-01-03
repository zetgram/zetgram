<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one size of a photo or a file / sticker thumbnail.

Source: https://core.telegram.org/bots/api#photosize
*/
class PhotoSize extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Photo width
    * @var int
    */
    public int $width;

    /**
    * Photo height
    * @var int
    */
    public int $height;

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
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}