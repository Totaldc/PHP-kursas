<?php

// function array_to_file($form) {
//     $file = 'db.txt';
//     $db = json_encode($form);
//     $bytes_written = file_put_contents($file, $db);
//     if ($bytes_written === false){
//         return false;
//     } else{
//         return true;
//     }
// }

function array_to_file($form) {
    $file = 'db.txt';
    $email = json_encode($form['fields']['email']);
    $psw = json_encode($form['fields']['number1']);
    $bytes_written = file_put_contents($file, $email . $psw);
    if ($bytes_written === false){
        return false;
    } else{
        return true;
    }
}