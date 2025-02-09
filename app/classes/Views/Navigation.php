<?php

namespace App\Views;

use App\App;
use Core\Router;
use Core\View;

class Navigation extends View
{
	
	public function __construct ()
	{
		$nav = [
			'home' => [
				'url' => Router::getUrl('index'),
				'title' => 'Home'
			],
		];
		if (App::$session->getUser()) {
			$nav[] = ['url' => Router::getUrl('play'), 'title' => 'Play'];
			$nav[] = ['url' => Router::getUrl('logout'), 'title' => 'Logout'];
		} else {
			$nav[] = ['url' => Router::getUrl('register'), 'title' => 'Register'];
			$nav[] = ['url' => Router::getUrl('login'), 'title' => 'Login'];
		}
		
		parent::__construct($nav);
	}
	
	public function render (string $template_path = ROOT . '/app/templates/nav.tpl.php')
	{
		return parent::render($template_path);
	}
}
