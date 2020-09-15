
<?php


$n = range(1,5);
shuffle($n);
for ($x=0; $x< 5; $x++)
{
$number =  $n[$x].' ';

print '<button class="btn-<?php print $number; ?>"></button>';

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <button class="btn-<?php print $number; ?>"></button>
    <button class="btn-<?php print $number; ?>"></button>
    <button class="btn-<?php print $number; ?>"></button>
    <button class="btn-<?php print $number; ?>"></button>
    
</body>
</html>