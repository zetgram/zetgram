<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default,
    this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you
    can use input_message_content to send a message with the specified content instead of the
    animation.

Source: https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
*/
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    /**
    * Type of the result, must be mpeg4_gif
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * A valid URL for the MP4 file. File size must not exceed 1MB
    * @var string
    */
    public string $mpeg4Url;

    /**
    * URL of the static thumbnail (jpeg or gif) for the result
    * @var string
    */
    public string $thumbUrl;

    /**
    * Video width
    * @var int
    */
    public ?int $mpeg4Width;

    /**
    * Video height
    * @var int
    */
    public ?int $mpeg4Height;

    /**
    * Video duration
    * @var int
    */
    public ?int $mpeg4Duration;

    /**
    * Title for the result
    * @var string
    */
    public ?string $title;

    /**
    * Caption of the MPEG-4 file to be sent, 0-1024 characters
    * @var string
    */
    public ?string $caption;

    /**
    * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
    * media caption.
    * @var string
    */
    public ?string $parseMode;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the video animation
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->mpeg4Url = $data->mpeg4_url;
        $this->thumbUrl = $data->thumb_url;
        if (isset($data->mpeg4_width)) {
            $this->mpeg4Width = $data->mpeg4_width;
        }
        if (isset($data->mpeg4_height)) {
            $this->mpeg4Height = $data->mpeg4_height;
        }
        if (isset($data->mpeg4_duration)) {
            $this->mpeg4Duration = $data->mpeg4_duration;
        }
        if (isset($data->title)) {
            $this->title = $data->title;
        }
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
    }
}