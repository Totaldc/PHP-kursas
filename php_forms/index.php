<?php

require 'bootloader.php';


$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'email' => [
            'label' => 'email',
            'type' => 'email',
            'value' => 'test-email',
            'extra' => [
                'attr' => [
                    'class' => 'email-field',
                    'placeholder' => 'email@email.com'
                ],
            ],
        ],
        'max' => [
            'label' => 'Lytis',
            'type' => 'select',
            'options' => [
                'male' => 'Kardanas',
                'female' => 'Mova',
            ],
        ],
    ],
    'buttons' => [
        'save' => [
                'title' => 'Join',
                'extra' => [
                    'attr' => [
                        'class' => 'big-button'
                    ],
            ],
        ],
    ],
    'labels' => [
        'email' => [
            'title' => 'labelis',
        ],
    ],
];




?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php include 'core/templates/form.tpl.php'; ?>
</body>

</html>