<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to a file. By default, this file will be sent by the user with an optional
    caption. Alternatively, you can use input_message_content to send a message with the specified
    content instead of the file. Currently, only .PDF and .ZIP files can be sent using this
    method.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultdocument
*/
class InlineQueryResultDocument extends InlineQueryResult
{
    /**
    * Type of the result, must be document
    * @var string
    */
    public string $type;

    /**
    * Unique identifier for this result, 1-64 bytes
    * @var string
    */
    public string $id;

    /**
    * Title for the result
    * @var string
    */
    public string $title;

    /**
    * A valid URL for the file
    * @var string
    */
    public string $documentUrl;

    /**
    * Mime type of the content of the file, either 'application/pdf' or 'application/zip'
    * @var string
    */
    public string $mimeType;

    /**
    * Caption of the document to be sent, 0-1024 characters
    * @var string
    */
    public ?string $caption;

    /**
    * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
    * media caption.
    * @var string
    */
    public ?string $parseMode;

    /**
    * Short description of the result
    * @var string
    */
    public ?string $description;

    /**
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the file
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    /**
    * URL of the thumbnail (jpeg only) for the file
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
        $this->documentUrl = $data->document_url;
        $this->mimeType = $data->mime_type;
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->description)) {
            $this->description = $data->description;
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