<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to an animated GIF file. By default, this animated GIF file will be sent by
    the user with optional caption. Alternatively, you can use input_message_content to send a
    message with the specified content instead of the animation.

Source: https://core.telegram.org/bots/api#inlinequeryresultgif
*/
class InlineQueryResultGif extends InlineQueryResult
{
    /**
    * Type of the result, must be gif
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * A valid URL for the GIF file. File size must not exceed 1MB
    * @var string
    */
    public string $gifUrl;

    /**
    * URL of the static thumbnail for the result (jpeg or gif)
    * @var string
    */
    public string $thumbUrl;

    /**
    * Width of the GIF
    * @var int
    */
    public ?int $gifWidth;

    /**
    * Height of the GIF
    * @var int
    */
    public ?int $gifHeight;

    /**
    * Duration of the GIF
    * @var int
    */
    public ?int $gifDuration;

    /**
    * Title for the result
    * @var string
    */
    public ?string $title;

    /**
    * Caption of the GIF file to be sent, 0-1024 characters
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
    * Content of the message to be sent instead of the GIF animation
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->gifUrl = $data->gif_url;
        $this->thumbUrl = $data->thumb_url;
        if (isset($data->gif_width)) {
            $this->gifWidth = $data->gif_width;
        }
        if (isset($data->gif_height)) {
            $this->gifHeight = $data->gif_height;
        }
        if (isset($data->gif_duration)) {
            $this->gifDuration = $data->gif_duration;
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