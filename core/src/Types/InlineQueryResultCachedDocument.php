<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents a link to a file stored on the Telegram servers. By default, this file will be sent
    by the user with an optional caption. Alternatively, you can use input_message_content to send
    a message with the specified content instead of the file.
    Note: This will only work in Telegram versions released after 9 April, 2016. Older clients
    will ignore them.

Source: https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
*/
class InlineQueryResultCachedDocument extends InlineQueryResult
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
    * A valid file identifier for the file
    * @var string
    */
    public string $documentFileId;

    /**
    * Short description of the result
    * @var string
    */
    public ?string $description;

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
    * Inline keyboard attached to the message
    * @var InlineKeyboardMarkup
    */
    public ?InlineKeyboardMarkup $replyMarkup;

    /**
    * Content of the message to be sent instead of the file
    * @var InputMessageContent
    */
    public ?InputMessageContent $inputMessageContent;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->id = $data->id;
        $this->title = $data->title;
        $this->documentFileId = $data->document_file_id;
        if (isset($data->description)) {
            $this->description = $data->description;
        }
        if (isset($data->caption)) {
            $this->caption = $data->caption;
        }
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->reply_markup)) {
            $this->replyMarkup = new InlineKeyboardMarkup($data->reply_markup);
        }
        if (isset($data->input_message_content)) {
            $this->inputMessageContent = new InputMessageContent($data->input_message_content);
        }
    }
}