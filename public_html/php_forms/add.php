<?php

require('bootloader.php');

use App\App;
use App\Pixels\Pixel;
use App\Views\Forms\PixelAddForm;
use App\Views\Pages\BasePage;


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

$add_pixels_page = new BasePage();
$add_pixels_page->setTitle('Add Pixels');
$add_pixels_page->setContent($form->render());
print $add_pixels_page->render();

?>
