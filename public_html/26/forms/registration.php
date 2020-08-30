
<?php

if (isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) {
   if($_POST['password1'] === $_POST['password2']){
       $message = 'Prisijungti pavyko';
   } else{
       $message = 'Prisijungti nepavyko';
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
    <title>Registration</title>
</head>
<body>

<form method="post">
    <input type="email" name="email" id="email" placeholder="Enter email">
    <input type="password" name="password1" id="password1" placeholder="Enter password">
    <input type="password" name="password2" id="password2" placeholder="Verify you password">
    <input type="submit">
</form>

<p><?php print $message; ?></p>
    
</body>
</html>