<?php

class Game {

  public array $teamA = [];
  public array $teamB = [];


  public function addPlayerToTeamA($player): void {

    $this->teamA[] = $player;

  }

  public function addPlayerToTeamB($player): void {
    $this->teamB[] = $player;
  }


}




