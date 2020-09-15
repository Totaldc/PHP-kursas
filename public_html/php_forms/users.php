<?php

require('bootloader.php');

$headers = ['Email', 'Password'];
// $table = generate_table_array(file_to_array(DB_FILE), $headers)? : [];
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
        main {
            width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border: 1px solid gray;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid gray;
            padding: 10px;
            text-align: center;
        }
	</style>
	<title>Document</title>
</head>
<body>
<main>
	<?php include('core/templates/table.tpl.php'); ?>

</main>
</body>
</html>