<?php

if(!isset($_SESSION)) {
    
    session_start();
}
$id = session_id();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}

$visits = $_SESSION['count'];

var_dump($id);


$h1 = "Welcome user nr $id";
$h2 = "It's your $visits time on this website";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php print $h1; ?></h1>
    <h2><?php print $h2; ?></h2>
</body>

</html>