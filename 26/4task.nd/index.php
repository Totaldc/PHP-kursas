
<?php 



if (isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['user_name']) && isset($_POST['lname']) && isset($_POST['gender']) && isset($_POST['why'])) {
    if($_POST['pass1'] === $_POST['pass2']){
        $message = 'Prisijungti nepavyko';
    } else{
        
    }

} else{
       $message = 'Suvesk visus laukus';
   }

  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="blank.php" method="post">
        <input type="text" name="user_name" id="name" placeholder="name">
        <input type="text" name="lname" id="lname" placeholder="last name">
        <input type="email" name="email" id="email" placeholder="email">
        <span>Lytis:</span>
        <label for="male">Male: </label>
        <input type="radio" name="gender" id="male" value="male">
        <label for="female">Female: </label>
        <input type="radio" name="gender" id="female" value="female">
        <select name="ocupation">
            <option value="Bedarbis">Bedarbis</option>
            <option value="Dirbantis">dirbantis</option>
            <option value="Nesakysiu">Nesakysiu</option>
        </select>
        <input type="checkbox" id="vehicle1" name="why[]" value="Todel">
        <input type="checkbox" id="vehicle1" name="why[]" value="Va todel">
        <input type="password" name="pass1" id="pass1" placeholder="password">
        <input type="password" name="pass2" id="pass2" placeholder="reenter password">
        <input type="submit">

       
    </form>

   
    
</body>
</html>