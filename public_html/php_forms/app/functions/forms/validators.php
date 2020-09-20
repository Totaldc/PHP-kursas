<?php

/**
 * Validates if email exists
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_unique (string $field_value, array &$field): bool
{
	$db = new FileDB(DB_FILE);
	$db->load();
	if ($db->getRowsWhere('users', ['email' => $field_value])) {
		$field['error'] = 'Toks vartotojas jau egzistuoja';
		return false;
	}
	
	return true;
}

/**
 * Validates if user exists
 *
 * @param array $field_value
 * @return bool
 */
function validate_login (array $field_value)
{
	$db = new FileDB(DB_FILE);
	$db->load();
	if ($db->getRowsWhere('users', ['email' => $field_value['email'], 'password' => $field_value['password']])) {
		$_SESSION['email'] = $field_value['email'];
		$_SESSION['password'] = $field_value['password'];
		return true;
	}
	return false;
}

/**
 * Validates if pixel already exists in database
 *
 * @param array $field_value
 * @param array $field
 * @return bool
 */
function validate_pixel_unique (array $field_value, array &$field): bool
{
	$db = new FileDB(DB_FILE);
	$db->load();
	if ($db->getRowsWhere('pixels', ['coordinate_x' => $field_value['coordinate_x'],
		'coordinate_y' => $field_value['coordinate_y']])) {
		$field['error'] = 'Toks pixelis jau egzistuoja';
		return false;
	}
	return true;
}

/**
 * Validates option selected
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_option (string $field_value, array $field)
{
	foreach($field['options'] as $option_key => $option_value){
		if($option_key === $field_value){
			return true;
		}
	}

	return false;
}