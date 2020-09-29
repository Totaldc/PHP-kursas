<?php

use App\App;
use App\Views\Pages\BasePage;
use Core\Views\Content;

require('bootloader.php');

if (!App::$session->getUser()) {
	header('Location: login.php');
	exit;
}

if (App::$db->tableExists('pixels')) {
	$pixels = App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);
}

$content = new Content($pixels);

$indexPage = new BasePage();
$indexPage->setTitle('Index: My');
$indexPage->setContent($content->render('index.tpl.php'));
print $indexPage->render();
