<?php


namespace App\Controllers;

use App\Abstracts\Controller;
use App\Views\Tables\UsersTable;

class UsersController extends Controller
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
	function index (): ?string
	{
		$content = new UsersTable();
		
		$this->page->setTitle('Users Table');
		$this->page->addCSS('assets/css/table.css');
		$this->page->setContent($content->render());
		return $this->page->render();
	}
}