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

