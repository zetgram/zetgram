<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use
    input_message_content to send a message with the specified content instead of the venue.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultvenue
*/
class InlineQueryResultVenue extends InlineQueryResult
{
    /**
    * Type of the result, must be venue
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 Bytes
    * @var string
    */
    public string $id;

    /**
    * Latitude of the venue location in degrees
    * @var float
    */
    public float $latitude;

    /**
    * Longitude of the venue location in degrees
    * @var float
    */
    public float $longitude;

    /**
    * Title of the venue
    * @var string
    */
    public string $title;

    /**
    * Address of the venue
    * @var string
    */
    public string $address;

    /**
    * Foursquare identifier of the venue if known
    * @var string
    */
    public ?string $foursquareId;

    /**
    * Foursquare type of the venue, if known. (For example, 'arts_entertainment/default', 'arts_entertainment/aquarium'
    * or 'food/icecream'.)
    * @var string
    */
    public ?string $foursquareType;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the venue
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
        $this->address = $data->address;
        if (isset($data->foursquare_id)) {
            $this->foursquareId = $data->foursquare_id;
        }
        if (isset($data->foursquare_type)) {
            $this->foursquareType = $data->foursquare_type;
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