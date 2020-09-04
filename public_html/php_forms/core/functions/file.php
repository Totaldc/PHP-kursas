<?php

function array_to_file($form) {
    $file = 'db.txt';
    $db = json_encode($form);
    $bytes_written = file_put_contents($file, $db);
    if ($bytes_written === true){
        var_dump($bytes_written);
        return true;
    } else{
        return false;
    }
}