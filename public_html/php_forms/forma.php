<?php

require 'bootloader.php';

$form = [
    'attr' =>
    [
        // 'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form',
    ],
    'fields' =>
    [
        'name' => [
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

$fields = [];
foreach($form['fields'] as $key => $field){
    $fields[] = $key;
        }

function sanitize_post($fields)
{

    var_dump($fields);

    foreach ($fields as $value) {
        $filter_params[$value] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $filter_params);
}

    $input = sanitize_post($fields);
    var_dump($input);

    

?>

<html>
    <body>
        <h1>Hack it!</h1>
        <?php include 'core/templates/form.tpl.php'; ?>
        <p><?php print $input['name'];?></p>
        <p><?php print $input['email'];?></p>
        <p><?php print $input['phone'];?></p>
        <p><?php print $input['checkbox'];?></p>
        <p><?php print $input['sex'];?></p>
    </body>

    <form method="POST">
    <input type="text" name="vardas" placeholder="<Bocmanas>">
    <input type="text" name="pavarde" placeholder="Bebrauskas">
    <button>Submit</button>
</form>
</html>