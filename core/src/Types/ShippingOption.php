<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one shipping option.

Source: https://core.telegram.org/bots/api#shippingoption
*/
class ShippingOption extends Base
{
    /**
    * Shipping option identifier
    * @var string
    */
    public string $id;

    /**
    * Option title
    * @var string
    */
    public string $title;

    /**
    * List of price portions
    * @var LabeledPriceCollection
    */
    public LabeledPriceCollection $prices;

    protected function build(stdClass $data)
    {
        $this->id = $data->id;
        $this->title = $data->title;
        $this->prices = new LabeledPriceCollection($data->prices);
    }
}