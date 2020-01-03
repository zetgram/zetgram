<?php

namespace Zetgram;

class InlineKeyboard implements KeyboardInterface
{
    /**
     * Keyboard array for future json_encoding
     * @var array
     */
    private array $keyboard;

    private const TYPE_URL = 'url';

    private const TYPE_CALLBACK = 'callback_data';

    public function __construct(array ...$buttonLines)
    {
        $this->addCallback(...$buttonLines);
    }

    public function addCallback(array ...$buttonLines)
    {
        $this->addButtons($buttonLines, self::TYPE_CALLBACK);
    }

    public function addUrl(array ...$buttonLines)
    {
        $this->addButtons($buttonLines, self::TYPE_URL);
    }

    private function addButtons(array $buttonLines, $type)
    {
        foreach ($buttonLines as $buttonLine) {
            $new_line = [];
            foreach ($buttonLine as $callback_data => $text) {
                $new_line[] = [
                    $type => $callback_data,
                    'text' => $text
                ];
            }
            $this->keyboard[] = $new_line;
        }
    }

    public function getKeyboard(): string
    {
        return json_encode(['inline_keyboard' => $this->keyboard]);
    }
}
