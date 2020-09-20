<?php

require('bootloader.php');

if (!is_logged_in()) {
	header('Location: login.php');
	exit;
}

$db = new FileDB(DB_FILE);

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'coordinate_x' => [
			'type' => 'text',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_is_number',
				'validate_field_range' => [
					'min' => 0,
					'max' => 499,
				],
			],
			'extra' => [
				'attr' => [
					'placeholder' => 'X koordinate',
				],
			],
		],
		'coordinate_y' => [
			'type' => 'text',
			'value' => '',
			'validators' => [
				'validate_field_not_empty',
				'validate_field_is_number',
				'validate_field_range' => [
					'min' => 0,
					'max' => 499,
				],
			],
			'extra' => [
				'attr' => [
					'placeholder' => 'Y koordinate',
				],
			],
		],
		'color' => [
			'type' => 'select',
			'value' => 'red',
			'validators' => [
				'validate_option'
			],
			'options' => [
				'red' => 'Red',
				'blue' => 'Blue',
				'green' => 'Green',
				'black' => 'Black',
			],
			'extra' => [
				'attr' => [
					'class' => 'color-selector'
				]
			]
		],
		'size' => [
			'label' => 'Pixeliuko dydis',
			'value' => 10,
			'type' => 'range',
			'min_value' => 1,
			'max_value' => 20,
			'validators' => [
				'validate_field_range' => [
					'min' => 1,
					'max' => 20,
				]
			]
		]
	],
	'buttons' => [
		'submit' => [
			'title' => 'Sukurk pixeli',
			'type' => 'submit',
			'value' => 'submit',
		],
	],
	'validators' => [
		'validate_pixel_unique',
	]
];

$nav = generate_nav();

if (!empty($_POST)) {
	// filter characters
	$form_values = sanitize_form_input_values($form);
	// validate form according to validators
	if (validate_form($form, $form_values)) {
		$form_values['email'] = $_SESSION['email'];
		$db->load();
		$db->insertRow('pixels', $form_values);
		$message = $db->save() ? 'Pixeliai prideti!' : 'Pixeliu prideti nepavyko';
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
	<title>Add pixels</title>
</head>
<body>
<header>
	<?php include ROOT . '/app/templates/nav.tpl.php'; ?>
</header>
<main>
	<div class="add container">
		<h1>Pridek pixeliuka</h1>
		<?php include ROOT . '/core/templates/form.tpl.php'; ?>
		<?php if (isset($message)) : ?>
			<div class="message">
				<span><?php print $message; ?></span>
			</div>
		<?php endif; ?>
	</div>
</main>
</body>
</html>
