<?php


use App\Controllers\PixelsController;

require('bootloader.php');
$controller = new PixelsController();
print $controller->index();