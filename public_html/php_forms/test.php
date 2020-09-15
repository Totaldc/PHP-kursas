<?php

require('bootloader.php');

$db = new FileDB(DB_FILE);

$array = [1, 2, 3, 5];

$db->setData($array);

var_dump($db);


$newData = $db->getData();

$database = $db->save();
var_dump($database);

$db->load();
$database = $db->getData();
var_dump($database);

$db->createTable('users_table');

// $db->dropTable('users_table');

// $db->truncateTable('users_table');


$row = ['name' => 'OtherName'];
$row2 = ['name' => 'OtherName'];
$row3 = ['name' => 'OtherName'];

$conditions = ['name' => 'OtherName'];

$db->insertRow('users_table', $row, 'First');
$db->insertRow('users_table', $row2, 'Second');
$db->insertRow('users_table', $row3, 'Third');
// $db->updateRow('users_table', 'First', $row);
// $db->getRowById('users_table', 'First');
var_dump($db->getRowsWhere('users_table', $conditions));
// $db->deleteRow('users_table', 'First');

// $db->insertRow('users_table', 'Name', 'First');
// $db->insertRow('users_table', 'Name', 'Second');
// $db->insertRow('users_table', 'Name', 'Third');

var_dump($db->getData());

