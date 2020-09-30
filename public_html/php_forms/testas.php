<?php

require 'bootloader.php';

$controller = new App\Controllers\PixelController();

print $controller->index();