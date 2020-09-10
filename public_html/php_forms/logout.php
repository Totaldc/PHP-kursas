<?php

require ('bootloader.php');

session_unset();
session_destroy();

var_dump($_SESSION);
