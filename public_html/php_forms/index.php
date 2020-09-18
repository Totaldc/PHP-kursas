<?php
require('bootloader.php');
$nav = generate_nav();
$db = new FileDB(DB_FILE);
$db->load();
if ($db->tableExists('pixels')) {
	$pixels = $db->getRowsWhere('pixels', []);
}
var_dump($pixels);
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
<style>
	.wall {

		position: relative;
		width: 500px;
		height: 500px;
		background-color: grey;

	}

	span {
		width: 10px;
		height: 10px;
	}

	.pixel {
		position: absolute;
	}
</style>

<body>
	<header>
		<?php include ROOT . '/app/templates/nav.php'; ?>
	</header>
	<div class="container">
		<div class="wall">
			<?php foreach ($pixels as $pixel) : ?>
				<span class="pixel" style=" background:<?php print $pixel['color'] ?>; bottom: <?php print $pixel['coordinate_y'] ?>px; left: <?php print $pixel['coordinate_x'] ?>px;"></span>
			<?php endforeach; ?>
		</div>
	</div>
</body>

</html>