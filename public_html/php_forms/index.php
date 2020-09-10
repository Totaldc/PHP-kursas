<?php

require('bootloader.php');

$h1 = $_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME <?php print $h1; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>