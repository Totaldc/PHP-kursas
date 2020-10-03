<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Pixels\Pixel;
use App\Views\Forms\PixelAddForm;
use App\Views\Forms\AddForm;
use Core\Router;
use Core\Views\Content;
use Core\Views\Form;

class PixelsController extends Controller
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
		//kintamasis $pixels pixelių masyvo duomenis iš db.json
		$pixels = App::$db->getRowsWhere('pixels', []);
		
		//sukuriamas naujas objektas, kurio pagalba gaunamas pixels masyvas (per View klasę), paduodamas $template_path???
		$content = new Content($pixels);
		
		//nurodomas page Title
		$this->page->setTitle('All Pixels');
		
		//nustatomas html content, paduodamas pixelių masyvas renderiui, kuris jau aprašytas index.tpl.php
		$this->page->setContent($content->render('pixels/index.tpl.php'));
		
		//išprintinamas visas puslapis
		return $this->page->render();
	}
	
	function my (): ?string
	{
		if (!App::$session->getUser()) {
			header('Location:'. Router::getUrl('login'));
			exit;
		}
		
		
		$content = new Content($pixels);
		
		$this->page->setTitle('My Pixels');
		
		$this->page->setContent($content->render('pixels/index.tpl.php'));
		
		return $this->page->render();
	}

	
	function add (): ?string
	{
		if (!App::$session->getUser()) {
			header('Location:'. Router::getUrl('login'));
			exit;
		}
		
		$form = new PixelAddForm();
		
		if ($form->isSubmitted()){
			if($form->validate()){
				$pixel = new Pixel($form->getSubmitData());
				$pixel->setEmail(App::$session->getUser()['email']);
				App::$db->insertRow('pixels', $pixel->_getData());
				header('Location:'. Router::getUrl('my'));
			}
		}
		
		
		$this->page->setTitle('Add Pixels');
		$this->page->setContent($form->render());
		return $this->page->render();
	}

	function game (): ?string
	{
		$form = new AddForm();
		
		if (!App::$session->getUser()) {
			header('Location:'. Router::getUrl('login'));
			exit;
		}
		
		$pixel = new Pixel($form->getSubmitData());
		$userRows = App::$db->getRowsWhere('accounts', ['email' => $_SESSION['email']]);
		var_dump($userRows);
		foreach ($userRows as $key => $row) {
			var_dump($key);
			var_dump($row['balansas']);
			if($form->getSubmitAction() === 'submit'){
				print 'valio blet, submit buvo';
				
				App::$db->updateRow('accounts', $key, ['balansas' => $_POST['balansas'], 'email' => $_SESSION['email']]);
			} 
		}
		if($form->getSubmitAction() === 'submit2'){
			print 'valio blet, submit2 buvo';
		} elseif($form->getSubmitAction() === 'submit') {
				$pixel->setEmail(App::$session->getUser()['email']);
				App::$db->updateRow('accounts', 'email@email.com', $pixel->_getData());
		}


		$content = new Content(['form' => $form->render(), 'error' => $error ?? null]);
		
		$this->page->setTitle('Add cash');
		$this->page->setContent($content->render('addCash.tpl.php'));
		return $this->page->render();
	}
}