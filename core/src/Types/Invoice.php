<?php

namespace Zetgram\Types;

use stdClass;

/*
This object contains basic information about an invoice.

Source: https://core.telegram.org/bots/api#invoice
*/
class Invoice extends Base
{
    /**
    * Product name
    * @var string
    */
    public string $title;

    /**
    * Product description
    * @var string
    */
    public string $description;

    /**
    * Unique bot deep-linking parameter that can be used to generate this invoice
    * @var string
    */
    public string $startParameter;

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

    protected function build(stdClass $data)
    {
        $this->title = $data->title;
        $this->description = $data->description;
        $this->startParameter = $data->start_parameter;
        $this->currency = $data->currency;
        $this->totalAmount = $data->total_amount;
    }
}