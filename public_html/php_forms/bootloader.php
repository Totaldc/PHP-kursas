<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');
require ('core/functions/html.php');
require ('core/functions/file.php');
require('app/functions/auth.php');
require ('app/functions/forms/validators.php');
require ('core/functions/forms/core.php');
require ('core/functions/forms/validators.php');
require ('core/classes/FileDB.php');