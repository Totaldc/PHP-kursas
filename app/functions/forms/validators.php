<?php

use App\App;

/**
 * Validates if email exists
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_unique (string $field_value, array &$field): bool
{
	if (App::$db->getRowsWhere('users', ['email' => $field_value])) {
		$field['error'] = 'Toks vartotojas jau egzistuoja!';
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
//function validate_login (array $field_value): bool
//{
//	return App::$session->login($field_value['email'], $field_value['password']);
//}

/**
 * Validates if pixel coordinates are taken
 *
 * @param array $form_values
 * @param array $form
 * @return bool
 */
function validate_pixel_coordinates (array $form_values, array &$form)
{
	$cord_x = intval($form_values['coordinate_x']);
	$cord_y = intval($form_values['coordinate_y']);
	
	$pixels = App::$db->getRowsWhere('pixels', []);
	foreach ($pixels as $pixel) {
		if (($cord_x + $form_values['size'] > $pixel['coordinate_x']
				&& $cord_x <
				$pixel['coordinate_x'] + $pixel['size'])
			&&
			($cord_y + $form_values['size'] > $pixel['coordinate_y'] &&
				$cord_y < $pixel['coordinate_y'] + $pixel['size'])) {
			$form['error'] = 'Koordinates jau uzimtos';
			return false;
		}
	}
	if ($cord_x + $form_values['size'] > 500) {
		$form['error'] = 'Pixelis per didelis';
		return false;
	}
	if ($cord_y + $form_values['size'] > 500) {
		$form['error'] = 'Pixelis per didelis';
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
	foreach ($field['options'] as $option_key => $option_value) {
		if ($option_key === $field_value) {
			return true;
		}
	}
	
	return false;
}