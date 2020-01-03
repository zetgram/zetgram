<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to an article or web page.

Source: https://core.telegram.org/bots/api#inlinequeryresultarticle
*/
class InlineQueryResultArticle extends InlineQueryResult
{
    /**
    * Type of the result, must be article
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 Bytes
    * @var string
    */
    public string $id;

    /**
    * Title of the result
    * @var string
    */
    public string $title;

    /**
    * Content of the message to be sent
    * @var InputMessageContent
    */
    public InputMessageContent $inputMessageContent;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * URL of the result
    * @var string
    */
    public ?string $url;

    /**
    * Pass True, if you don't want the URL to be shown in the message
    * @var bool
    */
    public ?bool $hideUrl;

    /**
    * Short description of the result
    * @var string
    */
    public ?string $description;

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
        $this->title = $data->title;
        $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->url)) {
            $this->url = $data->url;
        }
        if (isset($data->hide_url)) {
            $this->hideUrl = $data->hide_url;
        }
        if (isset($data->description)) {
            $this->description = $data->description;
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