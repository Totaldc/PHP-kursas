<?php
use App\App;

require('bootloader.php');

$nav = generate_nav();

App::$db;
if (App::$db->tableExists('pixels')) {
	$pixels = App::$db->getRowsWhere('pixels', ['email' => $_SESSION['email']]);
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
			<?php foreach ($pixels as $pixel): ?>
				<span class="pixel <?php print $pixel['color']; ?>"
				      style="bottom: <?php print $pixel['coordinate_y']; ?>px; left: <?php print
					      $pixel['coordinate_x']; ?>px; width: <?php print $pixel['size']; ?>px; height: <?php print
					      $pixel['size']; ?>px
						      "></span>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</body>
</html>
