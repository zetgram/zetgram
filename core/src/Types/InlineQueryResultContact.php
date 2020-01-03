<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a contact with a phone number. By default, this contact will be sent by the user.
    Alternatively, you can use input_message_content to send a message with the specified content
    instead of the contact.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultcontact
*/
class InlineQueryResultContact extends InlineQueryResult
{
    /**
    * Type of the result, must be contact
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 Bytes
    * @var string
    */
    public string $id;

    /**
    * Contact's phone number
    * @var string
    */
    public string $phoneNumber;

    /**
    * Contact's first name
    * @var string
    */
    public string $firstName;

    /**
    * Contact's last name
    * @var string
    */
    public ?string $lastName;

    /**
    * Additional data about the contact in the form of a vCard, 0-2048 bytes
    * @var string
    */
    public ?string $vcard;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the contact
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    /**
    * Url of the thumbnail for the result
    * @var string
    */
    public ?string $thumbUrl;

    /**
    * Thumbnail width
    * @var int
    */
    public ?int $thumbWidth;

    /**
    * Thumbnail height
    * @var int
    */
    public ?int $thumbHeight;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->phoneNumber = $data->phone_number;
        $this->firstName = $data->first_name;
        if (isset($data->last_name)) {
            $this->lastName = $data->last_name;
        }
        if (isset($data->vcard)) {
            $this->vcard = $data->vcard;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
        if (isset($data->thumb_url)) {
            $this->thumbUrl = $data->thumb_url;
        }
        if (isset($data->thumb_width)) {
            $this->thumbWidth = $data->thumb_width;
        }
        if (isset($data->thumb_height)) {
            $this->thumbHeight = $data->thumb_height;
        }
    }
}