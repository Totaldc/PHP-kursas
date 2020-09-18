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
                    'max' => 49,
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
                    'max' => 49,
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
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Ideti pixeli',
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

    unset($form_values['password_repeat']);
    $db->load();
    $db->insertRow('pixels', $form_values);
    $db->save();
    //		header('Location: login.php');
    //		exit;

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
    <?php ?>
</body>
</html>