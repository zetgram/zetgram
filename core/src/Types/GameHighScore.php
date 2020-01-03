<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents one row of the high scores table for a game.
    And that�s about all we�ve got for now.
    If you've got any questions, please check out our Bot FAQ

Source: https://core.telegram.org/bots/api#gamehighscore
*/
class GameHighScore extends Base
{
    /**
    * Position in high score table for the game
    * @var int
    */
    public int $position;

    /**
    * User
    * @var User
    */
    public User $user;

    /**
    * Score
    * @var int
    */
    public int $score;

    protected function build(stdClass $data)
    {
        $this->position = $data->position;
        $this->user = new User($data->user);
        $this->score = $data->score;
    }
}