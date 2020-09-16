<?php 


require 'bootloader.php';

$db = new FileDB(DB_FILE);
$db->load();
$db->createTable('users_table');
$db->save();