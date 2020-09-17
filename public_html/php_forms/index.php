<?php

require('bootloader.php');

$message = is_logged_in() ? 'WELCOME ' . $_SESSION['email'] : 'Nesate prisijunges';

// $color = $_SESSION['color'];
// $x = $_SESSION['number1'];
// $y = $_SESSION['number2'];

$db = new FileDB(DB_FILE);
$db->load();
$database = $db->getData();

foreach ($database['coord'] as $key => $value) {
	foreach ($value as $key => $item) {
		if ($key === 'x') {
			$x = $item;
		} else if ($key === 'y') {
			$y = $item;
		} else if ($key === 'color') {
			$color = $item;
		}
	}
}

print $x;
print $y;
print $color;
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Index</title>
</head>

<body>
	<header>
		<?php
		include 'app/templates/nav.php';
		?>
	</header>
	<h1><?php print $message; ?></h1>

</body>

</html>