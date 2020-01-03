<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents an incoming update.
    At most one of the optional parameters can be present in any given update.

Source: https://core.telegram.org/bots/api#update
*/
class Update extends Base
{
    /**
    * The update�s unique identifier. Update identifiers start from a certain positive number and increase
    * sequentially. This ID becomes especially handy if you�re using Webhooks, since it allows you to ignore repeated
    * updates or to restore the correct update sequence, should they get out of order. If there are no new updates for
    * at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
    * @var int
    */
    public int $updateId;

    /**
    * New incoming message of any kind � text, photo, sticker, etc.
    * @var Message
    */
    public ?Message $message;

    /**
    * New version of a message that is known to the bot and was edited
    * @var Message
    */
    public ?Message $editedMessage;

    /**
    * New incoming channel post of any kind � text, photo, sticker, etc.
    * @var Message
    */
    public ?Message $channelPost;

    /**
    * New version of a channel post that is known to the bot and was edited
    * @var Message
    */
    public ?Message $editedChannelPost;

    /**
    * New incoming inline query
    * @var InlineQuery
    */
    public ?InlineQuery $inlineQuery;

    /**
    * The result of an inline query that was chosen by a user and sent to their chat partner. Please see our
    * documentation on the feedback collecting for details on how to enable these updates for your bot.
    * @var ChosenInlineResult
    */
    public ?ChosenInlineResult $chosenInlineResult;

    /**
    * New incoming callback query
    * @var CallbackQuery
    */
    public ?CallbackQuery $callbackQuery;

    /**
    * New incoming shipping query. Only for invoices with flexible price
    * @var ShippingQuery
    */
    public ?ShippingQuery $shippingQuery;

    /**
    * New incoming pre-checkout query. Contains full information about checkout
    * @var PreCheckoutQuery
    */
    public ?PreCheckoutQuery $preCheckoutQuery;

    /**
    * New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
    * @var Poll
    */
    public ?Poll $poll;

    protected function build(stdClass $data)
    {
        $this->updateId = $data->update_id;
        if (isset($data->message)) {
            $this->message = new Message($data->message);
        }
        if (isset($data->edited_message)) {
            $this->editedMessage = new Message($data->edited_message);
        }
        if (isset($data->channel_post)) {
            $this->channelPost = new Message($data->channel_post);
        }
        if (isset($data->edited_channel_post)) {
            $this->editedChannelPost = new Message($data->edited_channel_post);
        }
        if (isset($data->inline_query)) {
            $this->inlineQuery = new InlineQuery($data->inline_query);
        }
        if (isset($data->chosen_inline_result)) {
            $this->chosenInlineResult = new ChosenInlineResult($data->chosen_inline_result);
        }
        if (isset($data->callback_query)) {
            $this->callbackQuery = new CallbackQuery($data->callback_query);
        }
        if (isset($data->shipping_query)) {
            $this->shippingQuery = new ShippingQuery($data->shipping_query);
        }
        if (isset($data->pre_checkout_query)) {
            $this->preCheckoutQuery = new PreCheckoutQuery($data->pre_checkout_query);
        }
        if (isset($data->poll)) {
            $this->poll = new Poll($data->poll);
        }
    }
}