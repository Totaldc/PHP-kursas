<?php

$distance = rand(1, 1000);
$consumption = 7.5;
$price_l = 1.3;

$fuel_total = $distance / 100 * $consumption;
$price_trip = $fuel_total * $price_l;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Keliones skaiciuokle</h1>
<ul>
    <li>Nuvaziuota distancija: <?php print $distance;?></li>
    <li>Sunaudota <?php print $fuel_total; ?> kuro.</li>
    <li>Kaina: <?php print $price_trip; ?> pinigu</li>
</ul>
    
</body>
</html>