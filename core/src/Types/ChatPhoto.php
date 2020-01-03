<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a chat photo.

Source: https://core.telegram.org/bots/api#chatphoto
*/
class ChatPhoto extends Base
{
    /**
    * File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as
    * long as the photo is not changed.
    * @var string
    */
    public string $smallFileId;

    /**
    * File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as
    * long as the photo is not changed.
    * @var string
    */
    public string $bigFileId;

    protected function build(stdClass $data)
    {
        $this->smallFileId = $data->small_file_id;
        $this->bigFileId = $data->big_file_id;
    }
}