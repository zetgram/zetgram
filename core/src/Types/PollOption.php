<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains information about one answer option in a poll.

Source: https://core.telegram.org/bots/api#polloption
*/
class PollOption extends Base
{
    /**
    * Option text, 1-100 characters
    * @var string
    */
    public string $text;

    /**
    * Number of users that voted for this option
    * @var int
    */
    public int $voterCount;

    protected function build(stdClass $data)
    {
        $this->text = $data->text;
        $this->voterCount = $data->voter_count;
    }
}