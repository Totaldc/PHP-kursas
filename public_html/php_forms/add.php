<?php

require('bootloader.php');

$form = [
	'attr' => [
		'method' => 'POST',
	],
	'fields' => [
		'number1' => [
			'label' => 'X:',
			'type' => 'number',
			'validators' => [
				'validate_field_not_empty',
			],
		],
		'number2' => [
			'label' => 'Y:',
			'type' => 'number',
			'validators' => [
				'validate_field_not_empty',
			],
        ],
        'sex' => [
            'label' => 'Color',
            'type' => 'select',
            // 'id' => 'kazkoks',
            'value' => 'Pick a color',
            'options' => [
                'black' => 'black',
                'red' => 'red',
                'blue' => 'blue',
                'green' => 'green',
            ],
        ],
	],
	'buttons' => [
		'submit' => [
			'title' => 'Chooose!',
			'type' => 'submit',
			'value' => 'submit',
		],
	],
];

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
	<title>Add</title>
</head>
<body>
<main>
	<h1>Koordinates:</h1>
	<?php include('core/templates/form.tpl.php'); ?>

</body>
</html>