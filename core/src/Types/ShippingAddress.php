<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a shipping address.

Source: https://core.telegram.org/bots/api#shippingaddress
*/
class ShippingAddress extends Base
{
    /**
    * ISO 3166-1 alpha-2 country code
    * @var string
    */
    public string $countryCode;

    /**
    * State, if applicable
    * @var string
    */
    public string $state;

    /**
    * City
    * @var string
    */
    public string $city;

    /**
    * First line for the address
    * @var string
    */
    public string $streetLine1;

    /**
    * Second line for the address
    * @var string
    */
    public string $streetLine2;

    /**
    * Address post code
    * @var string
    */
    public string $postCode;

    protected function build(stdClass $data)
    {
        $this->countryCode = $data->country_code;
        $this->state = $data->state;
        $this->city = $data->city;
        $this->streetLine1 = $data->street_line1;
        $this->streetLine2 = $data->street_line2;
        $this->postCode = $data->post_code;
    }
}