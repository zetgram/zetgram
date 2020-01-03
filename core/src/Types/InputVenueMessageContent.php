<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents the content of a venue message to be sent as the result of an inline query.

Source: https://core.telegram.org/bots/api#inputvenuemessagecontent
*/
class InputVenueMessageContent extends InputMessageContent
{
    /**
    * Latitude of the venue in degrees
    * @var float
    */
    public float $latitude;

    /**
    * Longitude of the venue in degrees
    * @var float
    */
    public float $longitude;

    /**
    * Name of the venue
    * @var string
    */
    public string $title;

    /**
    * Address of the venue
    * @var string
    */
    public string $address;

    /**
    * Foursquare identifier of the venue, if known
    * @var string
    */
    public ?string $foursquareId;

    /**
    * Foursquare type of the venue, if known. (For example, 'arts_entertainment/default', 'arts_entertainment/aquarium'
    * or 'food/icecream'.)
    * @var string
    */
    public ?string $foursquareType;

    protected function build(stdClass $data)
    {
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
    }
}