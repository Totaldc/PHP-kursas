<?php

require('bootloader.php');

$db = new FileDB(DB_FILE);

if(is_logged_in()){
	header('Location: index.php');
}

$form = [
	'attr' => [
		'class' => 'my-form',
		'id' => 'login-form',
	],
	'fields' => [
		'email' => [
            'label' => 'Email',
            'type' => 'email',
            'value' => 'email@email.com',
            'validators' =>
                [
                    'validate_field_not_empty',
                    'validate_register',
                ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Enter Your Email'
                ]
            ]
        ],
		'password' => [
			'label' => 'Number1:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'number',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_is_number',
				// 'validate_field_is_diff1',
				// 'validate_field_range' => [
				// 	'min' => 10,
				// 	'max' => 50,
				// ]

			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Enter number 1',
				],
			],
		],
		'password2' => [
			'label' => 'Number2:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'number',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_is_number',
				// 'validate_field_is_diff2',
				// 'validate_field_range' => [
				// 	'min' => 20,
				// 	'max' => 50,
				// ]

			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Enter number 2',
				],
			],
		],
	],
	'buttons' => [
		'submit' => [
			'title' => 'Submit',
			'type' => 'submit',
			'value' => 'submit',
			'extra' => [
				'attr' => [
					'class' => 'big-button',
				],
			],
		],
	],
	'validators' => [
		'validate_field_match' => [
			'password',
			'password2'
		]
	]
];


// if (!empty($_POST)) {
// 	$form_values = sanitize_form_input_values($form);
// 	$success = validate_form($form, $form_values);
// 	unset($form_values['password2']);
// 	if ($success) {
// 		form_success($form_values);
// 		header('Location: login.php');
// 	} else {
// 		var_dump('Enter correct information');
// 	}
// }

if (!empty($_POST)) {
	// filter characters
	$form_values = sanitize_form_input_values($form);
	// validate form according to validators
	if (validate_form($form, $form_values)) {
		unset($form_values['password2']);
		$db->load();
		$db->insertRow('users', $form_values);
		$message = $db->save() ? 'Registracija sėkminga!' : 'Užsiregistruoti nepavyko';
		header('Location: login.php');
		exit;
	}
}



?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
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

		form input,
		select {
			padding: 10px;
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
			padding: 10px;
		}
	</style>
	<title>Document</title>
</head>

<body>
	<main>
		<?php include('core/templates/form.tpl.php'); ?>
		<?php if (isset($message)) : ?>
			<span><?php print $message; ?></span>
		<?php endif; ?>
	</main>
</body>

</html>