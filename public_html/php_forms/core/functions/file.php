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

// function file_to_array($file)
// {
//     if (file_exists($file)) {
//         $data = file_get_contents($file);
//       $bytes_written = $decoded = json_decode($data, true);
//         var_dump($decoded);
//         if ($bytes_written === false){
//             return false;
//         } else{
//             return true;
//         }
// }
// }


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

// function form_success($form)
// {
//     if (file_exists('db.txt')) {
//         $current_data = file_get_contents('db.txt');
//         $array_data = json_decode($current_data, true);
//         if(validate_register($form, $array_data)){
//         var_dump($array_data);
//             print "yra";
//             $array_data[] = $form;
//             $final_data = json_encode($array_data);
//             file_put_contents('db.txt', $final_data);
//         return $array_data;
//     }
// }  
// }
/**
 * convert array to json and write to file
 *
 * @param $array
 * @param $file_name
 * @return bool
 */
function array_to_file(array $array, string $file_name): bool
{
    $array_json = json_encode($array);
    return file_put_contents($file_name, $array_json) !== false;
}
/**
 * convert json file to array
 *
 * @param $file_name
 * @return array or bool
 */
function file_to_array(string $file_name)
{
    if (file_exists($file_name)) {
        $data = file_get_contents($file_name);
        $decoded = json_decode($data, true);
        return is_array($decoded) ? $decoded : [];
    } else {
        return false;
    }
}
function form_success($form)
{
    var_dump($form);
    $database = file_to_array('db.txt');
    $database[] = $form;
  return array_to_file($database, 'db.txt');
}
// function file_to_array($file){
//     $current_data = file_get_contents($file);
//     $array_data = json_decode($current_data, true);
//     print "yra";
//     return $array_data;
// }

// function array_to_file($array_data, $file){
//     $file = 'db.txt';
//     $json = json_encode($array_data);
//     return file_put_contents($file, $json);
// }

// function form_success($form){
//     $database = file_to_array('db.txt');

//     $database[] = $form;

//     array_to_file($database, 'db.txt');
// }






// function form_success($form){
//     $file = 'db.txt';
//     $data = file_get_contents($file);
//     $decoded = json_decode($data, true);
    
//     $decoded[] = $_POST;
//     // add you data here at the proper position
    
//     $data = json_encode($decoded);
//     var_dump($data);
// }




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