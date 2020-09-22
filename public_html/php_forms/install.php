<?php
use App\App;


require ('bootloader.php');

$db = new App::$db->FileDB(DB_FILE);
$db->load();
$db->createTable('users');
$db->createTable('pixels');
$db->save();
print 'issaugota';