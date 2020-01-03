<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to a page containing an embedded video player or a video file. By default,
    this video file will be sent by the user with an optional caption. Alternatively, you can use
    input_message_content to send a message with the specified content instead of the video.
    If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you must
    replace its content using input_message_content.

Source: https://core.telegram.org/bots/api#inlinequeryresultvideo
*/
class InlineQueryResultVideo extends InlineQueryResult
{
    /**
    * Type of the result, must be video
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * A valid URL for the embedded video player or video file
    * @var string
    */
    public string $videoUrl;

    /**
    * Mime type of the content of video url, 'text/html' or 'video/mp4'
    * @var string
    */
    public string $mimeType;

    /**
    * URL of the thumbnail (jpeg only) for the video
    * @var string
    */
    public string $thumbUrl;

    /**
    * Title for the result
    * @var string
    */
    public string $title;

    /**
    * Caption of the video to be sent, 0-1024 characters
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
    * Video width
    * @var int
    */
    public ?int $videoWidth;

    /**
    * Video height
    * @var int
    */
    public ?int $videoHeight;

    /**
    * Video duration in seconds
    * @var int
    */
    public ?int $videoDuration;

    /**
    * Short description of the result
    * @var string
    */
    public ?string $description;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used
    * to send an HTML-page as a result (e.g., a YouTube video).
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->videoUrl = $data->video_url;
        $this->mimeType = $data->mime_type;
        $this->thumbUrl = $data->thumb_url;
        $this->title = $data->title;
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->video_width)) {
            $this->videoWidth = $data->video_width;
        }
        if (isset($data->video_height)) {
            $this->videoHeight = $data->video_height;
        }
        if (isset($data->video_duration)) {
            $this->videoDuration = $data->video_duration;
        }
        if (isset($data->description)) {
            $this->description = $data->description;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
    }
}