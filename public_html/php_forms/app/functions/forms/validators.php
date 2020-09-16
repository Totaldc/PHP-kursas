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
	foreach ($db as $element) {
		if ($db->getRowsWhere('user_table', ['username' => $field_value])) {
			$field['error'] = 'Toks vartotojas jau egzistuoja';
			return false;
		}
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
	$data = file_to_array(DB_FILE);
	foreach ($data as $user) {
		if ($field_value['email'] === $user['email'] && $field_value['password'] === $user['password']) {
			$_SESSION['email'] = $field_value['email'];
			$_SESSION['password'] = $field_value['password'];
			return true;
		}
	}

	return false;
}
