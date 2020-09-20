<?php

require ('bootloader.php');

$db = new FileDB(DB_FILE);
$db->load();
$db->createTable('users');
$db->createTable('pixels');
$db->save();
print 'issaugota';