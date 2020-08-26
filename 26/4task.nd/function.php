<?php

if (isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['user_name']) && isset($_POST['lname'])) {
    if($_POST['pass1'] === $_POST['pass2']){
        $message = 'Prisijungti pavyko';
    } else{
        $message = 'Prisijungti nepavyko';
    }
   } else{
       $message = 'Suvesk visus laukus';
   }

   var_dump($_POST);



?>