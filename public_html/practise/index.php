<?php

require 'Sniper.php';

$piotr = new Sniper('Piotr');
$artiom = new Sniper('Artiom');



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
