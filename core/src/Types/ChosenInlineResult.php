<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a result of an inline query that was chosen by the user and sent to their chat
    partner.
    Note: It is necessary to enable inline feedback via @Botfather in order to receive these
    objects in updates.

Source: https://core.telegram.org/bots/api#choseninlineresult
*/
class ChosenInlineResult extends Base
{
    /**
    * The unique identifier for the result that was chosen
    * @var string
    */
    public string $resultId;

    /**
    * The user that chose the result
    * @var User
    */
    public User $from;

    /**
    * The query that was used to obtain the result
    * @var string
    */
    public string $query;

    /**
    * Sender location, only for bots that require user location
    * @var Location
    */
    public ?Location $location;

    /**
    * Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
    * Will be also received in callback queries and can be used to edit the message.
    * @var string
    */
    public ?string $inlineMessageId;

    protected function build(stdClass $data)
    {
        $this->resultId = $data->result_id;
        $this->from = new User($data->from);
        $this->query = $data->query;
        if (isset($data->location)) {
            $this->location = new Location($data->location);
        }
        if (isset($data->inline_message_id)) {
            $this->inlineMessageId = $data->inline_message_id;
        }
    }
}