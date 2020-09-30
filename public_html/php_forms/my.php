<?php

require('bootloader.php');
use App\App;
use App\Views\Pages\BasePage;
use Core\Views\Content;

if (!App::$session->getUser()) {
	header('Location: login.php');
	exit;
}

if (App::$db->tableExists('pixels')) {
	$pixels = App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);
}

$content = new Content($pixels);

$indexPage = new BasePage();

$indexPage->setTitle('My Pixels');

$indexPage->setContent($content->render('index.tpl.php'));

print $indexPage->render();
?>

