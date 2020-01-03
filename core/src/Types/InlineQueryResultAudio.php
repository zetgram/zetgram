<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to an MP3 audio file. By default, this audio file will be sent by the user.
    Alternatively, you can use input_message_content to send a message with the specified content
    instead of the audio.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultaudio
*/
class InlineQueryResultAudio extends InlineQueryResult
{
    /**
    * Type of the result, must be audio
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * A valid URL for the audio file
    * @var string
    */
    public string $audioUrl;

    /**
    * Title
    * @var string
    */
    public string $title;

    /**
    * Caption, 0-1024 characters
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
    * Performer
    * @var string
    */
    public ?string $performer;

    /**
    * Audio duration in seconds
    * @var int
    */
    public ?int $audioDuration;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the audio
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->audioUrl = $data->audio_url;
        $this->title = $data->title;
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->performer)) {
            $this->performer = $data->performer;
        }
        if (isset($data->audio_duration)) {
            $this->audioDuration = $data->audio_duration;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
    }
}