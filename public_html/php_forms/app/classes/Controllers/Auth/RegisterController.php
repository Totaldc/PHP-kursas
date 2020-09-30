<?php


namespace App\Controllers\Auth;


use App\Abstracts\Controller;
use App\App;
use App\Users\User;
use App\Views\Forms\RegisterForm;

class RegisterController extends Controller
{
	
	/**
	 * This method builds or sets
	 * current $page content
	 * renders it and returns HTML
	 *
	 * So if we have ex.: ProductsController,
	 * it can have methods responsible for
	 * index() (main page, usualy a list),
	 * view() (preview single),
	 * create() (form for creating),
	 * edit() (form for editing)
	 * delete()
	 *
	 * These methods can then be called on each page accordingly, ex.:
	 * add.php:
	 * $controller = new PixelsController();
	 * print $controller->add();
	 *
	 *
	 * my.php:
	 * $controller = new ProductsController();
	 * print $controller->my();
	 *
	 * @return string|null
	 */
	function index(): ?string
	{
		
		$form = new RegisterForm();
		
		if ($form->isSubmitted()) {
			if ($form->validate()) {
				$user = new User($form->getSubmitData());
				App::$db->insertRow('users', $user->_getData());
				header('Location: login.php');
				exit;
			}
		}
		
		$this->page->setTitle('Registration');
		$this->page->setContent($form->render());
		return $this->page->render();
	}
}