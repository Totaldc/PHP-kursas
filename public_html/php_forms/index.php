<?php

require('bootloader.php');

$form = [
	'attr' => [
		'action' => 'index.php',
		'class' => 'my-form',
		'id' => 'login-form',
	],
	'fields' => [
		'first_name' => [
			'label' => 'First Name:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'text',
			'validators' => [
                'validate_field_not_empty',
                'validate_field_is_number'
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Pvz. Aivaras',
				],
			],
		],
		'last_name' => [
			'label' => 'Last Name:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_number'
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Pvz. Kybartaitis',
				],
			],
		],
		'full_name' => [
			'label' => 'Full name:',
			'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
			'value' => '',
			'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_space'
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Pvz. Kybartaitis',
				],
			],
		],
		'age' => [
			'label' => 'Age:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'text',
            'validators' => [
                'validate_field_not_empty',
				'validate_field_is_number',
				'validate_field_is_legal'
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Pvz. Kybartaitis',
				],
			],
		],
		'number1' => [
			'label' => 'Number1:',
			'filter' => FILTER_SANITIZE_ENCODED,
			'value' => '',
			'type' => 'number',
            'validators' => [
                'validate_field_not_empty',
				'validate_field_is_number',
				'validate_field_is_diff1',
			
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
				'validate_field_is_diff2',
				
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Enter number 2',
				],
			],
		],
		'email' => [
			'label' => 'Your Email:',
			'value' => '',
			'type' => 'email',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_number'
			],
			'extra' => [
				'attr' => [
					'class' => 'my-class',
					'placeholder' => 'Pvz. aivaras@makdraiveris.lt',
				],
			],
		],
		'sex' => [
			'label' => 'Sex:',
			'type' => 'select',
			'value' => '',
            'validators' => [
                'validate_field_not_empty',
                'validate_field_is_number'
			],
			'options' => [
				'male' => 'Male',
				'female' => 'Female',
				'trans' => 'Transexual',
				'other' => [
					'title' => 'Other',
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
];


if (!empty($_POST)) {
	$form_values = sanitize_form_input_values($form);
	validate_form($form, $form_values);
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
	<p><?php print $form_values['first_name'] ?? 'Neivesta' ?></p>
	<p><?php print $form_values['last_name'] ?? 'Neivesta' ?></p>
	<p><?php print $form_values['email'] ?? 'Neivesta' ?></p>
	<p><?php print $form_values['sex'] ?? 'Neivesta' ?></p>
</main>
</body>
</html>
