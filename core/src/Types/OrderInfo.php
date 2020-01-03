<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents information about an order.

Source: https://core.telegram.org/bots/api#orderinfo
*/
class OrderInfo extends Base
{
    /**
    * User name
    * @var string
    */
    public ?string $name;

    /**
    * User's phone number
    * @var string
    */
    public ?string $phoneNumber;

    /**
    * User email
    * @var string
    */
    public ?string $email;

    /**
    * User shipping address
    * @var ShippingAddress
    */
    public ?ShippingAddress $shippingAddress;

    protected function build(stdClass $data)
    {
        if (isset($data->name)) {
            $this->name = $data->name;
        }
        if (isset($data->phone_number)) {
            $this->phoneNumber = $data->phone_number;
        }
        if (isset($data->email)) {
            $this->email = $data->email;
        }
        if (isset($data->shipping_address)) {
            $this->shippingAddress = new ShippingAddress($data->shipping_address);
        }
    }
}