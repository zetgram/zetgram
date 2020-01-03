<?php

namespace Zetgram\Types;

use stdClass;

/*
Represents the content of a text message to be sent as the result of an inline query.

Source: https://core.telegram.org/bots/api#inputtextmessagecontent
*/
class InputTextMessageContent extends InputMessageContent
{
    /**
    * Text of the message to be sent, 1-4096 characters
    * @var string
    */
    public string $messageText;

    /**
    * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your
    * bot's message.
    * @var string
    */
    public ?string $parseMode;

    /**
    * Disables link previews for links in the sent message
    * @var bool
    */
    public ?bool $disableWebPagePreview;

    protected function build(stdClass $data)
    {
        $this->messageText = $data->message_text;
        if (isset($data->parse_mode)) {
            $this->parseMode = $data->parse_mode;
        }
        if (isset($data->disable_web_page_preview)) {
            $this->disableWebPagePreview = $data->disable_web_page_preview;
        }
    }
}