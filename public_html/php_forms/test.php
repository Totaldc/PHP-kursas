<?php
require('bootloader.php');

$db = new fileDB(DB_FILE);
$db->createTable('users');

$row = ['name' => 'testName'];
$find = ['name' => 'Aiste'];

$row_id = $db->insertRow('users', $row, 'one');
$row_id = $db->insertRow('users', $row, 'two');
$row_id = $db->insertRow('users', $row, 'three');

$results = $db->getRowsWhere('users', $row);
var_dump($results);
//var_dump($db);

//$db->getData();
//$get_array = $db->getData();
//var_dump($get_array);
//
//$db->save();

//$db->load();
//$get_array = $db->getData();
//var_dump($get_array);










