<?php

$filter_params = [
    'vardas' => FILTER_SANITIZE_SPECIAL_CHARS
];

$input = filter_input_array(INPUT_POST, $filter_params);

?>

<html>
    <body>
        <h1>Hack it!</h1>
        <h2><?php print $input['vardas'] ?? ''; ?></h2>
        <form method="POST">
            <input type="text" name="vardas">
            <input type="submit">
        </form>
    </body>
</html>