<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

require ('core/functions/html.php');
require ('core/functions/file.php');
require ('core/auth.php');
require ('core/classes/FileDB.php');