<?php
require 'bootloader.php';

use App\App;
use App\Users\User;

use App\Views\Pages\BasePage;
use Core\Views\Content;
use Core\Views\Form;




$login = new \App\Views\Forms\LoginForm();



if ($login->isSubmitted()) {
//	$form_values = sanitize_form_input_values($form);
	if ($login->validate()) {
//		App::$session->login($form_values['email'], $form_values['password']);
		header('Location: index.php');
	} else {
		$message = 'Prisijungti nepavyko';
	}
}

$content = new Content();

$indexPage = new BasePage();
$indexPage->setTitle('Index: Login');
$indexPage->setContent($content->render('login.tpl.php'));
print $indexPage->render();
