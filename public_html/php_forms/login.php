<?php

use App\App;
use App\Views\Forms\LoginForm;
use App\Views\Navigation;
use App\Views\Pages\BasePage;
use Core\Views\Content;

require('bootloader.php');

$form = new LoginForm();

if ($form->isSubmitted()) {
	if ($form->validate()) {
		App::$session->login($form->getSubmitData()['email'], $form->getSubmitData()['password'])
			? header('Location: index.php') : $error = 'Prisijungti nepavyko!';
	}
}

$content = new Content(['form' => $form->render(), 'error' => $error ?? null]);

$login_page = new BasePage();
$login_page->setTitle('Login');
$login_page->setContent($content->render('login.tpl.php'));
print $login_page->render();
?>
