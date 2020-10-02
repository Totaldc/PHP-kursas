<?php

class Game {

    public $score = 0;
   
}

class Player {

    public function play(Game $game) {
        $game->score++;
    }
}

$game = new Game();
$player = new Player();
$player->playGame($game);

print $game->score;