<?php

/**
 * Check if user is logged in
 *
 * @return bool
 */
// function is_logged_in(): bool
// {
// 	$db = new FileDB(DB_FILE);
// 	$db->load();
// 	if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
// 		$users = file_to_array(DB_FILE) ?? [];
// 		foreach ($users as $user) {
// 			if ($user['email'] === $_SESSION['email'] && $user['password'] === $_SESSION['password']) {
// 				return true;
// 			}
// 		}
// 	}
	
// 	return false;
// }


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