<?php

require('bootloader.php');

use App\App;
use App\Pixels\Pixel;

$pixel = new Pixel();
$pixel->_setData(['coordinate_x' => 678, 'coordinate_y' => 3, 'color' => 'red', 'email' => 'a@a.lt']);
//var_dump($pixel);
$pixel->_getData();


$nav = generate_nav();

if (App::$db->tableExists('pixels')) {
	$pixels = App::$db->getRowsWhere('pixels', []);
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
		<?php include ROOT . '/app/templates/nav.tpl.php'; ?>
	</header>
	<div class="container">
		<div class="wall">
			<div class="poop-wall">
				<?php foreach ($pixels as $pixel) : ?>
					<span class="pixel <?php print $pixel['color']; ?>" style="bottom: <?php print $pixel['coordinate_y']; ?>px;
						      left: <?php print
										$pixel['coordinate_x']; ?>px;
						      width: <?php print $pixel['size'] ?? 10; ?>px;
						      height: <?php print
											$pixel['size'] ?? 10; ?>px
						      ">
					</span>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</body>

</html>