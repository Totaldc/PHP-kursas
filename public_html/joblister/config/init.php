<?php
//Config Files
require_once 'config.php';

//Autolader
spl_autoload_register(function ($class_name) {
    require_once 'lib/' .$class_name. '.php';
});