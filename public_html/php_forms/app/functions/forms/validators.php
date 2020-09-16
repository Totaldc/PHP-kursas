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
function validate_login(array $field_value, array &$field)
{
	$db = new FileDB(DB_FILE);
	$db->load();
	
		if ($field_value['email'] === $db->getRowsWhere('users_table', ['email' => $field_value]) && $field_value['password'] === $db->getRowsWhere('users_table', ['email' => $field_value])) {
			$_SESSION['email'] = $field_value['email'];
			$_SESSION['password'] = $field_value['password'];
			return true;
		}


	return false;
}