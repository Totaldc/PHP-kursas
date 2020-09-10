<?php

require('bootloader.php');

$form = [
	'attr' => [
		'class' => 'my-form',
		'id' => 'login-form',
	],
	'fields' => [
		// 'first_name' => [
		// 	'label' => 'First Name:',
		// 	'filter' => FILTER_SANITIZE_ENCODED,
		// 	'value' => '',
		// 	'type' => 'text',
		// 	'validators' => [
		//         'validate_field_not_empty',
		//         'validate_field_is_number'
		// 	],
		// 	'extra' => [
		// 		'attr' => [
		// 			'class' => 'my-class',
		// 			'placeholder' => 'Pvz. Aivaras',
		// 		],
		// 	],
		// ],
		// 'last_name' => [
		// 	'label' => 'Last Name:',
		// 	'filter' => FILTER_SANITIZE_ENCODED,
		// 	'value' => '',
		// 	'type' => 'text',
		//     'validators' => [
		//         'validate_field_not_empty',
		//         'validate_field_is_number'
		// 	],
		// 	'extra' => [
		// 		'attr' => [
		// 			'class' => 'my-class',
		// 			'placeholder' => 'Pvz. Kybartaitis',
		// 		],
		// 	],
		// ],
		// 'full_name' => [
		// 	'label' => 'Full name:',
		// 	'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
		// 	'value' => '',
		// 	'type' => 'text',
		//     'validators' => [
		//         'validate_field_not_empty',
		//         'validate_field_space'
		// 	],
		// 	'extra' => [
		// 		'attr' => [
		// 			'class' => 'my-class',
		// 			'placeholder' => 'Pvz. Kybartaitis',
		// 		],
		// 	],
		// ],
		// 'age' => [
		// 	'label' => 'Age:',
		// 	'filter' => FILTER_SANITIZE_ENCODED,
		// 	'value' => '',
		// 	'type' => 'text',
		//     'validators' => [
		//         'validate_field_not_empty',
		// 		'validate_field_is_number',
		// 		'validate_field_is_legal'
		// 	],
		// 	'extra' => [
		// 		'attr' => [
		// 			'class' => 'my-class',
		// 			'placeholder' => 'Pvz. Kybartaitis',
		// 		],
		// 	],
		// ],
		'number1' => [
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
		'number2' => [
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
		
		// 'sex' => [
		// 	'label' => 'Sex:',
		// 	'type' => 'select',
		// 	'value' => '',
		//     'validators' => [
		//         'validate_field_not_empty',
		//         'validate_field_is_number'
		// 	],
		// 	'options' => [
		// 		'male' => 'Male',
		// 		'female' => 'Female',
		// 		'trans' => 'Transexual',
		// 		'other' => [
		// 			'title' => 'Other',
		// 		],
		// 	],
		// ],
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
		// 'validate_field_match' => [
		// 	'number1',
		// 	'number2'
		// ]
		],


];




if (!empty($_POST)) {
	$form_values = sanitize_form_input_values($form);
	$success = validate_form($form, $form_values);
	unset($form_values['number2']);
	if ($success) {
		form_success($form_values);
		header('Location: login.php');
		var_dump('Gal ir normalus');
	} else {
		var_dump('Tai kad nelabai');
	}
}

//var_dump($form);
//var_dump($form_values);

// $json = json_encode($form);
// $bytes = file_put_contents("db.txt", $json); 




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
		<?php include('core/templates/table.tpl.php'); ?>
		<?php if (isset($message)) : ?>
			<span><?php print $message; ?></span>
		<?php endif; ?>
		<?php if (isset($login_message)) : ?>
			<span><?php print $login_message; ?></span>
		<?php endif; ?>
		<p><?php print $form_values['first_name'] ?? 'Neivesta' ?></p>
		<p><?php print $form_values['last_name'] ?? 'Neivesta' ?></p>
		<p><?php print $form_values['email'] ?? 'Neivesta' ?></p>
		<p><?php print $form_values['sex'] ?? 'Neivesta' ?></p>
	</main>
</body>

</html>