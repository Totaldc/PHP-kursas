<?php

require('bootloader.php');

use App\App;
use App\Views\Navigation;
use Core\Views\Form;


$view_nav = new Navigation();
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

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Document</title>
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
            /*background-color: rgba(255, 0, 0, 0.2);*/
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
</head>
<body>
<header>
	<?php print $view_nav->render(); ?>
</header>
<main>
	<h1>Login:</h1>
	<?php print $login->render(); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</main>
</body>
</html>
