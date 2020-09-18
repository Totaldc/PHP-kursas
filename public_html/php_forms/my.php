<?php
require('bootloader.php');
$nav = generate_nav();
$db = new FileDB(DB_FILE);
$db->load();
if ($db->tableExists('pixels')) {
    $pixels = $db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include ROOT . '/app/templates/nav.php'; ?>
    </header>
    <div class="wall">
        <?php foreach ($pixels as $pixel) : ?>
            <span class="pixel <?php print $pixel['color']; ?>" style="bottom: <?php print $pixel['coordinate_y'] * 10 ?>px; left: <?php print $pixel['coordinate_x'] * 10 ?>px;"></span>
        <?php endforeach; ?>
    </div>
</body>

</html>