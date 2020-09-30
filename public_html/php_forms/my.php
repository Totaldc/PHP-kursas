<?php


use App\Controllers\MyController;

require('bootloader.php');
$controller = new MyController();
print $controller->index();
