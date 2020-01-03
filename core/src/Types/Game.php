<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a game. Use BotFather to create and edit games, their short names will
    act as unique identifiers.

Source: https://core.telegram.org/bots/api#game
*/
class Game extends Base
{
    /**
    * Title of the game
    * @var string
    */
    public string $title;

    /**
    * Description of the game
    * @var string
    */
    public string $description;

    /**
    * Photo that will be displayed in the game message in chats.
    * @var PhotoSizeCollection
    */
    public PhotoSizeCollection $photo;

    /**
    * Brief description of the game or high scores included in the game message. Can be automatically edited to include
    * current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText.
    * 0-4096 characters.
    * @var string
    */
    public ?string $text;

    /**
    * Special entities that appear in text, such as usernames, URLs, bot commands, etc.
    * @var MessageEntityCollection
    */
    public ?MessageEntityCollection $textEntities;

    /**
    * Animation that will be displayed in the game message in chats. Upload via BotFather
    * @var Animation
    */
    public ?Animation $animation;

    protected function build(stdClass $data)
    {
        $this->title = $data->title;
        $this->description = $data->description;
        $this->photo = new PhotoSizeCollection($data->photo);
        if (isset($data->text)) {
            $this->text = $data->text;
        }
        if (isset($data->text_entities)) {
            $this->textEntities = new MessageEntityCollection($data->text_entities);
        }
        if (isset($data->animation)) {
            $this->animation = new Animation($data->animation);
        }
    }
}