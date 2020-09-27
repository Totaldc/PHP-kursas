<?php

require('bootloader.php');

if(is_logged_in()){
	header('Location: index.php');
}

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
					'placeholder' => 'email@email.lt',
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
        $_SESSION = [
            'email' => $form_values['email'],
			'password' => $form_values['password']
		];
        // header('Location: index.php');
        var_dump($_SESSION);
        header('Location: index.php');
		return true;
    } else {
        var_dump('kazkas negerai');
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
	<title>Document</title>
	<style>
        h1 {
            text-align: center;
        }

        form {
            box-shadow: 0 4px 6px 2px #555555;
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
<main>
	<h1>Login:</h1>
	<?php include('core/templates/form.tpl.php'); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</main>
</body>
</html>