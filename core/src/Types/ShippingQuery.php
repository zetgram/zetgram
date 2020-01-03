<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains information about an incoming shipping query.

Source: https://core.telegram.org/bots/api#shippingquery
*/
class ShippingQuery extends Base
{
    /**
    * Unique query identifier
    * @var string
    */
    public string $id;

    /**
    * User who sent the query
    * @var User
    */
    public User $from;

    /**
    * Bot specified invoice payload
    * @var string
    */
    public string $invoicePayload;

    /**
    * User specified shipping address
    * @var ShippingAddress
    */
    public ShippingAddress $shippingAddress;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->from = new User($data->from);
        $this->invoicePayload = $data->invoice_payload;
        $this->shippingAddress = new ShippingAddress($data->shipping_address);
    }
}