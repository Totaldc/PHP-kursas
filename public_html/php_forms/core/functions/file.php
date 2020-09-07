<?php

// function array_to_file($form) {
//     $file = 'db.txt';
//     unset($form['fields']['number2']);
//     $db = json_encode($form['fields']['email']['value'] . $form['fields']['number1']['value']);
//     $bytes_written = file_put_contents($file, $db);
//     if ($bytes_written === false){
//         return false;
//     } else{
//         return true;
//     }
// }


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

function file_to_array($file)
{
    if (file_exists($file)) {
        $data = file_get_contents($file);
        $decoded = json_decode($data, true);
        var_dump($decoded);
        return is_array($decoded) ? $decoded : [];
    } else {
        return false;
    }
}


// $file = file_get_contents('db.txt');

// function array_from_file($file){
//     $pieces = explode(" ", $file);
//     var_dump($pieces);
//     var_dump(gettype($pieces));

// }



// var_dump($field_value);

// function array_to_file($form) {
//     $file = 'db.txt';
//     $array = array_values( array_unique( $form, SORT_REGULAR ));
//     $db = json_encode($array);
//     $bytes_written = file_put_contents($file, $db);
//     if ($bytes_written === false){
//         return false;
//     } else{
//         return true;
//     }
// }