<?php

function generate_nav(): array
{
	$nav = [
		'home' => [
			'url' => 'index.php',
			'title' => 'Home'
		],
	];
	if (is_logged_in()) {
		$nav[] = ['url' => 'add.php', 'title' => 'Add'];
		$nav[] = ['url' => 'my.php', 'title' => 'My'];
		$nav[] = ['url' => 'logout.php', 'title' => 'Logout'];
	} else {
		$nav[] = ['url' => 'register.php', 'title' => 'Register'];
		$nav[] = ['url' => 'login.php', 'title' => 'Login'];
	}
	return $nav;
}