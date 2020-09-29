<?php

require 'bootloader.php';

use App\App;
use App\Users\User;
use App\Views\Navigation;
use App\Views\Pages\BasePage;
use Core\Views\Content;
use Core\Views\Form;





$view_nav = new Navigation();
$form = new \App\Views\Forms\RegisterForm();


if ($form->isSubmitted()) {
	// filter characters
	// validate form according to validators
	if ($form->validate()) {
		$user = new User($form->getSubmitData());
		App::$db->insertRow('users', $user->_getData());
		//		$message = $db->save() ? 'Registracija sėkminga!' : 'Užsiregistruoti nepavyko';
		header('Location: login.php');
		exit;
	}
}

$content = new Content();

$indexPage = new BasePage();
$indexPage->setTitle('Index: Register');
$indexPage->setContent($content->render('register.tpl.php'));
print $indexPage->render();