<?php

require ('../bootloader.php');

$db = new FileDB(DB_FILE);
$db->load();
$db->createTable('users');
$db->createTable('pixels');
$db->createTable('accounts');
$db->save();
print 'issaugota';