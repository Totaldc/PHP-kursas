<?php

require('bootloader.php');

use App\App;
use App\Pixels\Pixel;
use App\Views\Navigation;
use Core\Views\Form;

$nav = new Navigation();

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


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Add pixels</title>
</head>
<body>
<header><?php print $nav->render(); ?></header>
<main>
	<div class="add container">
		<h1>Add pixel</h1>
		<?php print $view_add_form->render(); ?>
		<?php if (isset($message)) : ?>
			<div class="message">
				<span><?php print $message; ?></span>
			</div>
		<?php endif; ?>
	</div>
</main>
</body>
</html>
