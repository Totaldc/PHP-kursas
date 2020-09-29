<?php

require('bootloader.php');

use App\App;
use App\Users\User;
use App\Views\Navigation;
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
//var_dump($form);
//var_dump($form_values);



?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.css">
	<style>
        h1 {
            text-align: center;
        }

        form {
            box-shadow: 0 4px 6px 2px #5555;
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        form label {
            display: flex;
            flex-direction: column;
        }

        form label span {
            margin-bottom: 5px;
        }

        form input, select {
            padding: 10px;
            margin-bottom: 10px;
        }

        form span {
            margin-top: 5px;
            margin-bottom: 10px;
        }

        form .error {
            color: #660404;
            padding: 10px;
        }

        form button {
            margin-top: 20px;
            padding: 10px;
            background-color: cornflowerblue;
            color: white;
            border: none;
        }

        .message {
            text-align: center;
        }
	</style>
	<title>Document</title>
</head>
<body>
<header>
<?php print $view_nav->render(); ?>
</header>
<main>
	<h1>Registracija:</h1>
	<?php print $form->render(); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</body>
</html>
