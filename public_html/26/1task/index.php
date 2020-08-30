<!-- 1 uzduotis -->

<?php
$x = $_POST['number'];

function square($x)
{

    print  $x  * $x;
}

square($x);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="number" name="number" id="number" placeholder="Enter number">
        <input type="submit">
    </form>
</body>
</html>