<?php

namespace Zetgram;

class ReplyKeyboardRemove implements KeyboardInterface
{

    public function getKeyboard(): string
    {
        return json_encode(['remove_keyboard'=>true]);
    }
}