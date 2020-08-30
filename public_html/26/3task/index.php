<?php

if (isset($_POST["slider"])) {
    $x = $_POST['slider'];
    print "Slider value: $x";
} else {
    print "Please slide the Slider Bar and Press Submit.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
</head>

<body>
    <main>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQakhB2hNmivnE3zbD1yBNom4t9Np_anvFMdw&usqp=CAU" alt="img" width="<?php print $x ?>">
            <form method="POST">
                <input type="range" name="slider" id="slider" value="<?php print $x ?>">
                <button type="submit">Spausk</button>
            </form>
    </main>
</body>

</html>