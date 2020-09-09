<?php

$id = $_COOKIE['id'] ?? time();
$visits = ($_COOKIE['count_visit'] ?? 0) +1;

setcookie('id', $id, time() + 3600);
setcookie('count_visit', $visits,  time() + 3600);

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