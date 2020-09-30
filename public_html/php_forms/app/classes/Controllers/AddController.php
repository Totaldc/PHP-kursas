<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Pixels\Pixel;
use App\Views\Forms\PixelAddForm;
use Core\Views\Content;

class AddController extends Controller
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
		if (!App::$session->getUser()) {
			header('Location: login.php');
			exit;
		}
		
		$form = new PixelAddForm();
		
		if ($form->isSubmitted()){
			if($form->validate()){
				$pixel = new Pixel($form->getSubmitData());
				$pixel->setEmail(App::$session->getUser()['email']);
				App::$db->insertRow('pixels', $pixel->_getData());
				header('Location: my.php');
			}
		}
		
		$this->page->setTitle('Add Pixels');
		$this->page->setContent($content->render('pixels/index.tpl.php'));
		return $this->page->render();
	}
    }