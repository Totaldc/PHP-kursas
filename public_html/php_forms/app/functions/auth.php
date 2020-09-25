<?php

use App\App;

/**
 * Check if user is logged in
 *
 * @return bool
 */
function is_logged_in (): bool
{
	if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
		if (App::$db->getRowsWhere('users', ['email' => $_SESSION['email'], 'password' => $_SESSION['password']])) {
			return true;
		}
	}
	
	return false;
}

/**
// * Logout user from site
// *
// * @param false $redirect
// */
//function logout ($redirect = false)
//{
//	setcookie('PHPSESSID', null, -1);
//	session_destroy();
//	$_SESSION = [];
//	if ($redirect) {
//		header('Location: login.php');
//		exit;
//	}
//}