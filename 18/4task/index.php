<?php 

$img = "images/bomb.png";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex">
        <div>
            <span><img class="boom-<?php date('s'); ?>" src=<?php print $img; ?> width="<?php print date('s'); ?>0"  alt="" /></span>
            <span><?php print date('s'); ?></span>
        </div>
    </div>
</body>
</html>



