<?php

require('bootloader.php');

use App\App;
use App\Pixels\Pixel;
use Core\Views\Form;
use App\Views\Pages\BasePage;
use Core\Views\Content;



if (!App::$session->getUser()) {
	header('Location: login.php');
	exit;
}


$view_add_form = new \App\Views\Forms\AddForm();

if ($view_add_form->isSubmitted()) {
	
	
	if ($view_add_form->validate()) {
		$pixel = new Pixel($view_add_form->getSubmitData());
		$pixel->setEmail(App::$session->getUser()['email']);
		App::$db->insertRow('pixels', $pixel->_getData());
		header('Location: my.php');
	}
}

$content = new Content();

$indexPage = new BasePage();
$indexPage->setTitle('Index: Pixels');
$indexPage->setContent($content->render('add.tpl.php'));
print $indexPage->render();