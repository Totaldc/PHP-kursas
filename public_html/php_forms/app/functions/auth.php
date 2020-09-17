<?php

/**
 * Verifying if user is logged in
 *
 * @return bool
 */
function is_logged_in(): bool
{
    $db = new FileDB(DB_FILE);
    $db->load();
    if (empty($_SESSION)) {
        return false;
    } else {
        if ($db->getRowsWhere('users_table', ['email' => $_SESSION['email'], 'password' => $_SESSION['password']])) {
            return true;
        }
    }
    return false;
}


function logout($redirect = false)
{
	setcookie('PHPSESSID', null, - 1);
	session_destroy();
	$_SESSION = [];
	if($redirect){
		header('Location: login.php');
		exit;
	}
}