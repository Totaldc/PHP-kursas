<?php

const POSITION_TYPES = ['SG', 'PG', 'C', 'LF', 'HF'];
const NAMES = ['Petras', 'Jonas', 'Tadas', 'Lukas', 'Gedas'];
const SURNAMES = ['Petrasson', 'Jonasson', 'Tadasson', 'Lukasson', 'Gedasson'];

function createPlayer()
{
    $player = [];
    $player['name'] = NAMES[rand(0, count(NAMES) -1)];
    $player['surname'] = SURNAMES[rand(0, count(NAMES) -1)];
    $player['number'] = rand(0, 99);
    $player['age'] = rand(17, 34);
    $player['height'] = rand(175, 230);
    $player['weight'] = $player['height'] / rand(175, 200);
    $player['position'] = POSITION_TYPES[rand(0, count(POSITION_TYPES) -1)];


    return $player;

    // return [
    //     'name' => 'player1',
    //     'surname' => 'player1',
    //     'number' => 7,
    //     'age' => 22,
    //     'height' => 200,
    //     'weight' => 95,
    //     'position' => POSITION_TYPES[3],
    // ];
}

function createTeam(){
    for($i = 0; $i < rand(10, 12); $i++){
        $team['player'][] = createPlayer();
    }
}
