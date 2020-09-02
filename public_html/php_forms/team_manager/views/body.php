<?php

include 'utils/teamHelperFunctions.php';

$team1 = [
    

    'name' => 'TeamTitle',
    'coach' => 'Jonas Jonauskas',
    'players' => [],
];

for($i = 0; $i < 10; $i++){
    $team1['player'][] = createPlayer();
}