<?php

namespace Zetgram\Types;

use stdClass;

/*
Contains information about the current status of a webhook.

Source: https://core.telegram.org/s/api#webhookinfo
*/
class WebhookInfo extends Base
{
    /**
    * Webhook URL, may be empty if webhook is not set up
    * @var string
    */
    public string $url;

    /**
    * True, if a custom certificate was provided for webhook certificate checks
    * @var bool
    */
    public bool $hasCustomCertificate;

    /**
    * Number of updates awaiting delivery
    * @var int
    */
    public int $pendingUpdateCount;

    /**
    * Unix time for the most recent error that happened when trying to deliver an update via webhook
    * @var int
    */
    public ?int $lastErrorDate;

    /**
    * Error message in human-readable format for the most recent error that happened when trying to deliver an update
    * via webhook
    * @var string
    */
    public ?string $lastErrorMessage;

    /**
    * Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
    * @var int
    */
    public ?int $maxConnections;

    /**
    * A list of update types the bot is subscribed to. Defaults to all update types
    * @var StringCollection
    */
    public ?StringCollection $allowedUpdates;

    protected function build(stdClass $data)
    {
        $this->url = $data->url;
        $this->hasCustomCertificate = $data->has_custom_certificate;
        $this->pendingUpdateCount = $data->pending_update_count;
        if (isset($data->last_error_date)) {
            $this->lastErrorDate = $data->last_error_date;
        }
        if (isset($data->last_error_message)) {
            $this->lastErrorMessage = $data->last_error_message;
        }
        if (isset($data->max_connections)) {
            $this->maxConnections = $data->max_connections;
        }
        if (isset($data->allowed_updates)) {
            $this->allowedUpdates = new StringCollection($data->allowed_updates);
        }
    }
}