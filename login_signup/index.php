<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / SignUp</title>
</head>

<body>

    <main>

        <h2>Login Here</h2>

        <form action="validation.php" method="post">
            <input type="text" name="user_name" id="user_name" placeholder="Enter your name">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="submit">
        </form>


        <h2>Register Here</h2>

        <form action="registration.php" method="post">
            <input type="text" name="user_name" id="user_name" placeholder="Enter your name">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="submit">
        </form>

    </main>

</body>

</html>