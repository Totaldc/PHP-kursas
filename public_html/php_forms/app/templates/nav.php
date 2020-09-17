<?php


// $nav = [
// 	'login' => [
// 		'home' => [
// 			'title' => 'Home',
// 			'url' => '#',
// 		],
// 		'add' => [
// 			'title' => 'Add',
// 			'url' => '#',
// 		],
// 		'logout' => [
// 			'title' => 'Logout',
// 			'url' => '#',
// 		],
//     ],
//     'logout' => [
// 		'home' => [
// 			'title' => 'Home',
// 			'url' => '#',
// 		],
// 		'register' => [
// 			'title' => 'Register',
// 			'url' => '#',
// 		],
// 		'login' => [
// 			'title' => 'login',
// 			'url' => '#',
// 		],
// 	],
// ];
?>
<?php foreach (generate_nav() ?? [] as $field): ?>
		
    <!-- Checking if input has label -->
    <a href= <?php print $field['url'] ?>><?php print $field['title'] ?></a>

<?php endforeach; ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>