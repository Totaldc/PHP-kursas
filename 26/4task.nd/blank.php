<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blankas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="wrapper">
            <div class="flex f-direction center">
                <div>
                    <h1>Blankas</h1>
                </div>
                <div>
                    <span>Vartotojo vardas: <?php print $_POST['user_name']; ?></span>
                    <span>Vartotojo pavarde: <?php print $_POST['lname'] ?></span>
                    <span>Vartotojo emailas: <?php print $_POST['email'] ?></span>
                    <span>Lytis: <?php print $_POST['gender'] ?></span>
                </div>
            </div>
        </div>
    </main>
</body>

</html>