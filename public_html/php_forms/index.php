<?php

require 'bootloader.php';

$form = [
    'attr' =>
    [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' =>
    [
        'name' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'label' => 'Name',
            'type' => 'text',
            // 'value' => 'name',
            'extra' =>
            [
                'attr' =>
                [
                    'class' => 'name-field',
                    'placeholder' => 'Vardas',
                ],
            ],
        ],
        'email' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            // 'label' => 'E-Mail',
            'type' => 'email',
            // 'value' => 'test-mail',
            'extra' =>
            [
                'attr' =>
                [
                    'class' => 'email-field',
                    'placeholder' => 'lopo@email.com',
                ],
            ],
        ],
        'phone' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'label' => 'Phone',
            'type' => 'tel',
            // 'value' => 'phone',
            'extra' =>
            [
                'attr' =>
                [
                    'class' => 'phone-field',
                    'placeholder' => 'Phone',
                ],
            ],
        ],
        'checkbox' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'label' => 'I have a bike',
            'type' => 'checkbox',
            'value' => 'Bike',
            'extra' =>
            [
                'attr' =>
                [
                    'class' => 'checkbox-field',
                ],
            ],
        ],
        'sex' => [
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'label' => 'Lytis',
            'type' => 'select',
            'value' => 'female',
            // 'id' => 'kazkoks',
            'options' => [
                'male' => 'Kardanas',
                'female' => 'Mova',
                'other' => 'Kardamova',
            ],
        ],
    ],
    'buttons' =>
    [
        'save' =>
        [
            'title' => 'Join',
            'extra' =>

            [
                'attr' =>
                [
                    'class' => 'big-button',
                ],
            ],
        ],
    ],
];


function returnFields($form)
{
    $fields = [];
    foreach ($form['fields'] as $key => $field) {
        $fields[] = $key;
    }
    return $fields;
}

$inpval = returnFields($form);

// function sanitize_post($fields)
// {

//     var_dump($fields);

//     foreach ($fields as $value) {
//         $filter_params[$value] = FILTER_SANITIZE_SPECIAL_CHARS;
//     }
//     return filter_input_array(INPUT_POST, $filter_params);
// }

//     $input = sanitize_post($fields);
//     var_dump($input);

function sanitize_form_input_values($form)
{
    foreach ($form['fields'] as  $value) {
        foreach ($value as $key => $item) {
            if ($key === 'filter') {
                $filter = $item;
                return $filter;
            }
        }
    }
}

var_dump(sanitize_form_input_values($form));


function sanitize_post($inpval, $form)
{
    var_dump($inpval);
    foreach ($inpval  as $value) {
        $filter_params[$value] =  sanitize_form_input_values($form);
    }
    return filter_input_array(INPUT_POST, $filter_params);
}

$input = sanitize_post($inpval, $form);
var_dump($input);



function validate_form(&$form, $input)
{
    foreach ($form['fields'] as $key => &$field) {
        if ($input[$key] === '') {
            $field['error'] = 'palikote tuscia laukeli';
            return $field['error'];
        } 
    }
}

$error = validate_form($form, $input);

var_dump($error);

?>

<!DOCTYPE html>
<html lang="en">
​

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form from array</title>
</head>
​

<body>
    <?php include 'core/templates/form.tpl.php'; ?>
    <p><?php print $input['name']; ?></p>
    <p><?php print $error; ?></p>
    <p><?php print $input['email']; ?></p>
    <p><?php print $error; ?></p>
    <p><?php print $input['phone']; ?></p>
    <p><?php print $error; ?></p>
    <p><?php print $input['checkbox']; ?></p>
    <p><?php print $input['sex']; ?></p>
</body>
​

</html>