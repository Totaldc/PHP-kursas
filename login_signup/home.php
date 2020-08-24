<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

<a href="logout.php">Logout</a>

<h1>WELCOME <?php print $_SESSION['username']; ?></h1>
    
</body>
</html>