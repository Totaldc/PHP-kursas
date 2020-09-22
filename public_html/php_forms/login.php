<?php
use App\App;

require('bootloader.php');

App::$session;

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
	],
	'buttons' => [
		'submit' => [
			'title' => 'Login',
			'type' => 'submit',
			'value' => 'submit',
		],
	],
	'validators' => [
		'validate_login'
	]
];

if (!empty($_POST)) {
	$form_values = sanitize_form_input_values($form);
	if (validate_form($form, $form_values)) {
		$message = 'Prisijungti pavyko';
		 header('Location: index.php');
	} else {
		$message = 'Prisijungti nepavyko';
	}
}

$nav = generate_nav();

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
	<?php include ROOT . '/app/templates/nav.tpl.php'; ?>
</header>
<main>
	<h1>Login:</h1>
	<?php include ROOT . '/core/templates/form.tpl.php'; ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</main>
</body>
</html>
