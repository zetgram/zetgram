<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a sticker set.

Source: https://core.telegram.org/bots/api#stickerset
*/
class StickerSet extends Base
{
    /**
    * Sticker set name
    * @var string
    */
    public string $name;

    /**
    * Sticker set title
    * @var string
    */
    public string $title;

    /**
    * True, if the sticker set contains animated stickers
    * @var bool
    */
    public bool $isAnimated;

    /**
    * True, if the sticker set contains masks
    * @var bool
    */
    public bool $containsMasks;

    /**
    * List of all set stickers
    * @var StickerCollection
    */
    public StickerCollection $stickers;

    protected function build(stdClass $data)
    {
        $this->name = $data->name;
        $this->title = $data->title;
        $this->isAnimated = $data->is_animated;
        $this->containsMasks = $data->contains_masks;
        $this->stickers = new StickerCollection($data->stickers);
    }
}