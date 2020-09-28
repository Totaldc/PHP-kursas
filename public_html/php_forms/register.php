<?php

require('bootloader.php');

use App\App;
use App\Users\User;
use App\Views\Navigation;
use Core\Views\Form;



$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'email' => [
			'label' => 'Your Email:',
			'type' => 'email',
			'validators' => [
				'validate_field_not_empty',
				'validate_user_unique',
			],
			'extra' => [
				'attr' => [
					'placeholder' => 'Pvz. aivaras@makdraiveris.lt',
				],
			],
		],
		'password' => [
			'label' => 'Password:',
			'type' => 'password',
			'validators' => [
				'validate_field_not_empty',
			],
		],
		'password_repeat' => [
			'label' => 'Repeat Password:',
			'type' => 'password',
			'validators' => [
				'validate_field_not_empty',
			],
		],
	],
	'buttons' => [
		'submit' => [
			'title' => 'Register',
			'type' => 'submit',
			'value' => 'submit',
		],
	],
	'validators' => [
		'validate_fields_match' => [
			'fields' => [
				'password',
				'password_repeat',
			],
			'error' => 'Laukeliai privalo sutapti',
		],
	],
];
$view_nav = new Navigation();
$register = new Form($form);


if (!empty($_POST)) {
	// filter characters
	$form_values = sanitize_form_input_values($form);
	// validate form according to validators
	if (validate_form($form, $form_values)) {
		//		unset($form_values['password_repeat']);
		$user = new User($form_values);
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
	<?php print $register->render(); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</body>
</html>
