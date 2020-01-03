<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents an incoming inline query. When the user sends an empty query, your bot
    could return some default or trending results.

Source: https://core.telegram.org/bots/api#inlinequery
*/
class InlineQuery extends Base
{
    /**
    * Unique identifier for this query
    * @var string
    */
    public string $id;

    /**
    * Sender
    * @var User
    */
    public User $from;

    /**
    * Text of the query (up to 512 characters)
    * @var string
    */
    public string $query;

    /**
    * Offset of the results to be returned, can be controlled by the bot
    * @var string
    */
    public string $offset;

    /**
    * Sender location, only for bots that request user location
    * @var Location
    */
    public ?Location $location;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->from = new User($data->from);
        $this->query = $data->query;
        $this->offset = $data->offset;
        if (isset($data->location)) {
            $this->location = new Location($data->location);
        }
    }
}