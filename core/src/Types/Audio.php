<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents an audio file to be treated as music by the Telegram clients.

Source: https://core.telegram.org/bots/api#audio
*/
class Audio extends Base
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
    * Performer of the audio as defined by sender or by audio tags
    * @var string
    */
    public ?string $performer;

    /**
    * Title of the audio as defined by sender or by audio tags
    * @var string
    */
    public ?string $title;

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

    /**
    * Thumbnail of the album cover to which the music file belongs
    * @var PhotoSize
    */
    public ?PhotoSize $thumb;

    protected function build(stdClass $data)
    {
        $this->fileId = $data->file_id;
        $this->duration = $data->duration;
        if (isset($data->performer)) {
            $this->performer = $data->performer;
        }
        if (isset($data->title)) {
            $this->title = $data->title;
        }
        if (isset($data->mime_type)) {
            $this->mimeType = $data->mime_type;
        }
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
        if (isset($data->thumb)) {
            $this->thumb = new PhotoSize($data->thumb);
        }
    }
}