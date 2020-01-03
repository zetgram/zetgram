<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains information about a poll.

Source: https://core.telegram.org/bots/api#poll
*/
class Poll extends Base
{
    /**
    * Unique poll identifier
    * @var string
    */
    public string $id;

    /**
    * Poll question, 1-255 characters
    * @var string
    */
    public string $question;

    /**
    * List of poll options
    * @var PollOptionCollection
    */
    public PollOptionCollection $options;

    /**
    * True, if the poll is closed
    * @var bool
    */
    public bool $isClosed;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->question = $data->question;
        $this->options = new PollOptionCollection($data->options);
        $this->isClosed = $data->is_closed;
    }
}