<?php

namespace App\Views\Pages;


use Core\View;

class LoginPage extends BasePage
{
	public function __construct ()
	{
		$theContent = new View;

		parent::__construct();
		$this->setTitle('Pixels');
		$this->setContent($theContent->render(ROOT . 'app/templates/content/login.tpl.php'));
	}
}