<?php
function sesh($form_values)
{

if(!isset($_SESSION)) {
    
    session_start();
}
$id = session_id();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}

$visits = $_SESSION['count'];

$_SESSION['email'] = $form_values['email'];
$_SESSION['password'] = $form_values['number1'];

var_dump($_SESSION);


}







