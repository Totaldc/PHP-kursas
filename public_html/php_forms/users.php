<?php
require 'bootloader.php';

$db = new FileDB(DB_FILE);
$db->load();
$users = $db->getData();

$table = [
	'headers' => [
		'Email',
		'Password',
	],
	'rows' =>
		$users,
];
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Users table</title>
</head>
<body>
<?php include ROOT . '/core/templates/table.tpl.php'; ?>
</body>
</html>