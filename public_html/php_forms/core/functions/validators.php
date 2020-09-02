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
	if($field_value == ''){
		$field['error'] = 'Palikote tuščią laukelį';
		return false;
	} else {
		return true;
	}
}

function validate_field_is_number($field_value, &$field){
    if(!is_numeric($field_value)){
        $field['error'] = 'Laukelio verte privalo buti skaicius';
		return false;
    } else {
        return true;
    }
}