<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a photo to be sent.

Source: https://core.telegram.org/bots/api#inputmediaphoto
*/
class InputMediaPhoto extends InputMedia
{
    /**
    * Type of the result, must be photo
    * @var string
    */
    public string $type;

    /**
    * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL
    * for Telegram to get a file from the Internet, or pass 'attach://<file_attach_name>' to upload a new one using
    * multipart/form-data under <file_attach_name> name.
    * @var string
    */
    public string $media;

    /**
    * Caption of the photo to be sent, 0-1024 characters
    * @var string
    */
    public ?string $caption;

    /**
    * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
    * media caption.
    * @var string
    */
    public ?string $parseMode;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->media = $data->media;
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
    }
}