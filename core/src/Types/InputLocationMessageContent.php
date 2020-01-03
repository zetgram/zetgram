<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents the content of a location message to be sent as the result of an inline query.

Source: https://core.telegram.org/bots/api#inputlocationmessagecontent
*/
class InputLocationMessageContent extends InputMessageContent
{
    /**
    * Latitude of the location in degrees
    * @var float
    */
    public float $latitude;

    /**
    * Longitude of the location in degrees
    * @var float
    */
    public float $longitude;

    /**
    * Period in seconds for which the location can be updated, should be between 60 and 86400.
    * @var int
    */
    public ?int $livePeriod;

    protected function build(stdClass $data)
    {
        $this->latitude = $data->latitude;
        $this->longitude = $data->longitude;
        if (isset($data->live_period)) {
            $this->livePeriod = $data->live_period;
        }
    }
}