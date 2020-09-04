<?php

function array_to_file($form) {
    $file = 'db.txt';
    $db = json_encode($form);
    $bytes_written = file_put_contents($file, $db);
    if ($bytes_written === false){
        return false;
    } else{
        return true;
    }
}