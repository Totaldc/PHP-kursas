<?php

$cruises_json = FileDataBase::readJSON('cruises.json');
$cruises = [];
foreach($cruises_assoc_arr as $cruise_assoc_arr){
    $cruises[] = Cruise::createFromAssocArr($cruises_assoc_arr);
}
$cruise - Cruise::createFromAssocArr();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>VEIKIA</h2>
    <?php var_dump($cruises_json) ?>
</body>
</html>