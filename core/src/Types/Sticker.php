<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a sticker.

Source: https://core.telegram.org/bots/api#sticker
*/
class Sticker extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * Sticker width
    * @var int
    */
    public int $width;

    /**
    * Sticker height
    * @var int
    */
    public int $height;

    /**
    * True, if the sticker is animated
    * @var bool
    */
    public bool $isAnimated;

    /**
    * Sticker thumbnail in the .webp or .jpg format
    * @var PhotoSize
    */
    public ?PhotoSize $thumb;

    /**
    * Emoji associated with the sticker
    * @var string
    */
    public ?string $emoji;

    /**
    * Name of the sticker set to which the sticker belongs
    * @var string
    */
    public ?string $setName;

    /**
    * For mask stickers, the position where the mask should be placed
    * @var MaskPosition
    */
    public ?MaskPosition $maskPosition;

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
        $this->isAnimated = $data->is_animated;
        if (isset($data->thumb)) {
            $this->thumb = new PhotoSize($data->thumb);
        }
        if (isset($data->emoji)) {
            $this->emoji = $data->emoji;
        }
        if (isset($data->set_name)) {
            $this->setName = $data->set_name;
        }
        if (isset($data->mask_position)) {
            $this->maskPosition = new MaskPosition($data->mask_position);
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
    }
}