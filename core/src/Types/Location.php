<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a point on the map.

Source: https://core.telegram.org/bots/api#location
*/
class Location extends Base
{
    /**
    * Longitude as defined by sender
    * @var float
    */
    public float $longitude;

    /**
    * Latitude as defined by sender
    * @var float
    */
    public float $latitude;

    protected function build(stdClass $data)
    {
        $this->longitude = $data->longitude;
        $this->latitude = $data->latitude;
    }
}