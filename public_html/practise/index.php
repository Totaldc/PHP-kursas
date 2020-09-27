<?php

require 'Sniper.php';
require 'Game.php';

$piotr = new Sniper('Piotr');
$artiom = new Sniper('Artiom');
$valodia = new Sniper('Valodia');
$vadim = new Sniper('Vadim');



$game = new Game();
$game->addPlayerToTeamA($piotr);
$game->addPlayerToTeamA($artiom);
$game->addPlayerToTeamB($valodia);
$game->addPlayerToTeamB($vadim);

var_dump($game);




$health = $piotr->health;
$damage = $piotr->damage;

$resultP = $piotr->spotted();
$resultA = $artiom->spotted();

if ($resultA) {
    var_dump('Artiom spotted');
} else if ($resultP) {
    var_dump('Piotr spotted');
} else {
    var_dump('Both spotted each other');
}


$hitOrMiss = $piotr->attack();

var_dump($hitOrMiss);


$hit = $piotr->hit($hitOrMiss);

var_dump($hit);

$isAlive = $piotr->isAlive();

var_dump($isAlive);


foreach ($game->teamA as $teamA) {
    $seenA = $teamA->spotted();
    if ($seenA) {
        var_dump('pamate A');
        $hit = $teamA->attack();
        if ($hit) {
            var_dump('pasove A');
        } else {
            var_dump('nepasove A');

    foreach ($game->teamB as $teamB) {
        $seenB = $teamB->spotted();
        if ($seenB) {
            var_dump('nepamate A, iesko B');
            var_dump('pamate B');
            $hit = $teamA->attack();
            if ($hit) {
                var_dump('pasove B');
            } else {
                var_dump('nepasove B');
            }
        }
    }
}
}
}

