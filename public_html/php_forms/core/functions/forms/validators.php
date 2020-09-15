<?php

/**
 * validate not empty fields
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_not_empty (string $field_value, array &$field): bool
{
	if ($field_value == '') {
		$field['error'] = 'Palikote tuščią laukelį';
		return false;
	} else {
		return true;
	}
}

/**
 * validate if value is number
 *
 * @param $field_value
 * @param $field
 * @return bool
 */
function validate_field_is_number (string $field_value, array &$field): bool
{
	if (!is_numeric($field_value)) {
		$field['error'] = 'Laukelio vertė turi būti skaičius';
		return false;
	} else {
		return true;
	}
}

/**
 * validate space between names
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_space_between_names (string $field_value, array &$field): bool
{
	$split_name = explode(' ', trim($field_value));
	if (count($split_name) < 2) {
		$field['error'] = 'Vardas ir pavardė turi būti atskirti';
		return false;
	} else {
		return true;
	}
}

/**
 * validate if age is between 18 and 100
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_age (string $field_value, array &$field): bool
{
	if (($field_value > 18) && ($field_value < 100)) {
		return true;
	} else {
		return false;
	}
}

/**
 * validate if number is in range
 *
 * @param string $field_value
 * @param array $field
 * @param array $params
 * @return bool or null
 */
function validate_field_range (string $field_value, array &$field, array $params): ?bool
{
	if (($field_value < $params['min']) || ($field_value > $params['max'])) {
		$field['error'] = strtr('Laukelio vertė turi būti @from iki @to', [
			'@from' => $params['min'],
			'@to' => $params['max']
		]);
		return false;
	} else {
		return true;
	}
}


/**
 * validates matching fields
 *
 * @param $field_value
 * @param $form
 * @param $params
 * @return bool
 */
function validate_fields_match (array $field_value, array &$form, array $params): bool
{
//	var_dump(['form_values' =>  $field_value, 'params' => $params]);

	for ($i = 1; $i < count($params['fields']); $i++){
		if ($field_value[$params['fields'][0]] !== $field_value[$params['fields'][$i]]) {
			$form['error'] = $params['error'] ?? 'Default error';
			return false;
		}
	}
	
	return true;
}









