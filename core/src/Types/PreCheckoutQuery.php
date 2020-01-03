<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains information about an incoming pre-checkout query.

Source: https://core.telegram.org/bots/api#precheckoutquery
*/
class PreCheckoutQuery extends Base
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
    * Three-letter ISO 4217 currency code
    * @var string
    */
    public string $currency;

    /**
    * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$
    * 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
    * point for each currency (2 for the majority of currencies).
    * @var int
    */
    public int $totalAmount;

    /**
    * Bot specified invoice payload
    * @var string
    */
    public string $invoicePayload;

    /**
    * Identifier of the shipping option chosen by the user
    * @var string
    */
    public ?string $shippingOptionId;

    /**
    * Order info provided by the user
    * @var OrderInfo
    */
    public ?OrderInfo $orderInfo;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->from = new User($data->from);
        $this->currency = $data->currency;
        $this->totalAmount = $data->total_amount;
        $this->invoicePayload = $data->invoice_payload;
        if (isset($data->shipping_option_id)) {
            $this->shippingOptionId = $data->shipping_option_id;
        }
        if (isset($data->order_info)) {
            $this->orderInfo = new OrderInfo($data->order_info);
        }
    }
}