<?php

require('bootloader.php');

use App\App;
use App\Users\User;
use App\Views\Forms\RegisterForm;
use App\Views\Pages\BasePage;

$form = new RegisterForm();

if ($form->isSubmitted()) {
	if ($form->validate()) {
		$user = new User($form->getSubmitData());
		App::$db->insertRow('users', $user->_getData());
		header('Location: login.php');
		exit;
	}
}

$register_page = new BasePage();
$register_page->setTitle('Registration');
$register_page->setContent($form->render());
print $register_page->render();

?>

