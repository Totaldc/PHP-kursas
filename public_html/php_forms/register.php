<?php

require('bootloader.php');

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


if (!empty($_POST)) {
    $form_values = sanitize_form_input_values($form);
    $success = validate_form($form, $form_values);
    if ($success) {
        unset($form_values['password_repeat']);
        $db = new FileDB(DB_FILE);
        $db->load();
        $db->insertRow('users_table', $form_values);
        $save_data = $db->save();
        $message = $save_data ? 'Issaugota' : 'Neisaugota';
        header('Location: login.php');
        exit;
    } else {
        $message = 'Nepaejo';
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
	<title>Document</title>
</head>
<body>
<main>
	<h1>Registracija:</h1>
	<?php include('core/templates/form.tpl.php'); ?>
	<?php if (isset($message)) : ?>
		<div class="message">
			<span><?php print $message; ?></span>
		</div>
	<?php endif; ?>
</body>
</html>
