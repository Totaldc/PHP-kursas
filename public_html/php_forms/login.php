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
		$db = new FileDB(DB_FILE);
        $db->load();
		$message = 'Prisijungti pavyko';
//		var_dump($_SESSION);
		 header('Location: index.php');
	} else {
		$message = 'Prisijungti nepavyko';
	}
}


// if (!empty($_POST)) {
//     $form_values = sanitize_form_input_values($form);
//     $success = validate_form($form, $form_values);
//     if ($success) {
//         unset($form_values['password_repeat']);
//         $db = new FileDB(DB_FILE);
//         $db->load();
//         $db->insertRow('users', $form_values);
//         $save_data = $db->save();
//         $message = $save_data ? 'Issaugota' : 'Neisaugota';
//         header('Location: login.php');
//         exit;
//     } else {
//         $message = 'Nepaejo';
//     }
// }


// if (!empty($_POST)) {
// 	// filter characters
// 	$form_values = sanitize_form_input_values($form);
// 	// validate form according to validators
// 	if (validate_form($form, $form_values)) {
// 		unset($form_values['password_repeat']);
		
// 		if (!empty(file_to_array(DB_FILE))) {
// 			$file_to_array = file_to_array(DB_FILE);
// 			$file_to_array[] = $form_values;
// 		} else {
// 			$file_to_array[] = $form_values;
// 		}
		
// 		$message = array_to_file($file_to_array, DB_FILE) ? 'Registracija sėkminga!' : 'Užsiregistruoti nepavyko';
// 		header('Location: login.php');
// 		exit;
// 	}
	
// }


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
