<?php

/**
 * validate not empty fields
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty($field_value, &$field)
{
    if ($field_value == '') {
        $field['error'] = 'Palikote tuščią laukelį';
        return false;
    } else {
        return true;
    }
}

function validate_field_is_number($field_value, &$field)
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Laukelio verte privalo buti skaicius';
        return false;
    } else {
        return true;
    }
}

function validate_field_is_legal($field_value, &$field): int
{
    if ($field_value < 18 || $field_value > 100) {
        $field['error'] = 'Netinkamas amzius';
        return false;
    } else {
        return true;
    }
}

function validate_field_space($field_value, &$field): bool
{
    if ($field_value == trim($field_value) && strpos($field_value, ' ') !== false) {
        return true;
    } else {
        $field['error'] = 'Ismok rasyt';
        return false;
    }
}

function validate_field_is_diff1($field_value, &$field)
{

    if ($field_value < 100 || $field_value > 200) {
        $field['error'] = 'Netinkamas skaicius';
        return false;
    } else {
        var_dump('valio');
        return true;
    }
}

function validate_field_is_diff2($field_value, &$field)
{

    if ($field_value < 50 || $field_value > 100) {
        $field['error'] = 'Netinkamas skaicius';
        return false;
    } else {
        // $params = $field['validators']['validate_field_range']['min'];
        // var_dump($params);
        return true;
    }
}

function validate_field_range($field_value, &$field, $params)
{

   $params = $field['validators']['validate_field_range'];


    if ($field_value < $params['min'] || $field_value > $params['max']) {
        $field['error'] = 'Netinkamas skaicius';
        return false;
    } else {

        return true;
    }
}

function validate_field_match($form_values, &$form, $params){
    // var_dump($form);
    if ($form_values[$params[0]] === $form_values[$params[1]]) {
       print 'puikiai';
    } else {
        $form['error'] = 'Nu tu...';
        return false;
    }
}



/**
 * is user exists in DB_FILE
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_register(string $field_value, array &$field): bool
{
    $data_arr = file_to_array('db.txt');
    foreach ($data_arr as $key => $value) {
        if ($value['email'] === $field_value) {
            $field['error'] = "User $field_value already registered";
            return false;
        }
    }
    return true;
}


// function validate_register(string $field_value, array &$field): bool
// {
//     $data_arr = file_to_array('db.txt');
//     foreach ($data_arr as $key => $value) {
//         if ($value['email'] === $field_value) {
//             $field['error'] = "User $field_value already registered";
//             return false;
//         }
//     }
//     return true;
// }
