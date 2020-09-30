<?php


use App\Controllers\Auth\LogoutController;

require('bootloader.php');

$controller = new LogoutController();
print $controller->index();

