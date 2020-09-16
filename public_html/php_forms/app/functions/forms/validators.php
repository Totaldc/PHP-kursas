<?php

/**
 * validates if email already exists
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_user_unique(string $field_value, array &$field): bool
{
	$db = new FileDB(DB_FILE);
	$db->load();

		if ($db->getRowsWhere('users_table', ['email' => $field_value])) {
			$field['error'] = 'Toks vartotojas jau egzistuoja';
			return false;
		}
	
	return true;
}

/**
 * validates if user exists
 *
 * @param array $field_value
 * @param array $field
 * @return bool
 */
function validate_login(array $form_values, array &$form): bool
{
    $db = new FileDB(DB_FILE);
    $db->load();
    if ($db->getRowsWhere('users_table', $form_values)) {
        return true;
    }
    $form['error'] = "nepavyko!";
    return false;
}