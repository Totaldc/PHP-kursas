<?php

$fields = ['vardas', 'pavarde'];

/**
 * sanitize array keys
 *
 * @param array $fields
 * @return array
 */
function sanitize_post($fields)
{

    var_dump($fields);

    foreach ($fields as $value) {
        $filter_params[$value] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $filter_params);
}

$input = sanitize_post($fields);

?>

<html>

<body>
    <h1>Hack it!</h1>
    <form method="POST">
        <input type="text" name="vardas">
        <input type="text" name="pavarde">
        <input type="submit">
    </form>
    <p><?php print $input['vardas']; ?></p>
    <p><?php print $input['pavarde']; ?></p>
</body>

</html>