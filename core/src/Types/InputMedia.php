<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents the content of a media message to be sent. It should be one of
     - InputMediaAnimation
     - InputMediaDocument
     - InputMediaAudio
     - InputMediaPhoto
     - InputMediaVideo

Source: https://core.telegram.org/bots/api#inputmedia
*/
class InputMedia extends Base
{
    protected function build(stdClass $data)
    {
    }
}