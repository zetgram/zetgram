<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a location on a map. By default, the location will be sent by the user.
    Alternatively, you can use input_message_content to send a message with the specified content
    instead of the location.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultlocation
*/
class InlineQueryResultLocation extends InlineQueryResult
{
    /**
    * Type of the result, must be location
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 Bytes
    * @var string
    */
    public string $id;

    /**
    * Location latitude in degrees
    * @var float
    */
    public float $latitude;

    /**
    * Location longitude in degrees
    * @var float
    */
    public float $longitude;

    /**
    * Location title
    * @var string
    */
    public string $title;

    /**
    * Period in seconds for which the location can be updated, should be between 60 and 86400.
    * @var int
    */
    public ?int $livePeriod;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the location
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    /**
    * Url of the thumbnail for the result
    * @var string
    */
    public ?string $thumbUrl;

    /**
    * Thumbnail width
    * @var int
    */
    public ?int $thumbWidth;

    /**
    * Thumbnail height
    * @var int
    */
    public ?int $thumbHeight;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->latitude = $data->latitude;
        $this->longitude = $data->longitude;
        $this->title = $data->title;
        if (isset($data->live_period)) {
            $this->livePeriod = $data->live_period;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
        if (isset($data->thumb_url)) {
            $this->thumbUrl = $data->thumb_url;
        }
        if (isset($data->thumb_width)) {
            $this->thumbWidth = $data->thumb_width;
        }
        if (isset($data->thumb_height)) {
            $this->thumbHeight = $data->thumb_height;
        }
    }
}