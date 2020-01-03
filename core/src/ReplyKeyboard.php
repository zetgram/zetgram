<?php

namespace Zetgram;

class ReplyKeyboard implements KeyboardInterface
{
    private array $keyboard;

    public function __construct(array ...$buttonLines)
    {
        $this->addButtonLines(...$buttonLines);
    }

    public function addChunk(array $buttons, int $size = 4)
    {
        $this->addButtonLines(...array_chunk($buttons, $size));
    }

    private function addButtonLines(array ...$buttonLines)
    {
        foreach ($buttonLines as $buttonLine) {
            $this->keyboard[] =  array_map(function ($button) {
                return ['text' => $button];
            }, $buttonLine);
        }
    }

    public function getKeyboard(): string
    {
        return json_encode(['keyboard'=>$this->keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => true]);
    }
}
