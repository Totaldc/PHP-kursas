<?php

function sanitize_post($fields)
{
    foreach ($fields as $key => $value) {
        $filter[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
    }
    return filter_input_array(INPUT_POST, $filter);
}

    $input = sanitize_post($_POST);

?>

<html>
    <body>
        <h1>Hack it!</h1>
        <form method="POST">
            <input type="text" name="vardas">
            <input type="text" name="pavarde">
            <input type="submit">
        </form>
        <p><?php print $input['vardas'];?></p>
        <p><?php print $input['pavarde'];?></p>
    </body>
</html>