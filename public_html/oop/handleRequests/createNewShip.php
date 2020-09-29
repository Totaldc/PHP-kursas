<?php

require_once '../init.php';

$count = count($_FILES['images']['name']);
for ($i = 0; $i < $count; $i++) {
   $fileName = "fileUpload_" . $_FILES['images']['name'][$i];
   $fullpath = '../assets/images' . $fileName;
   move_uploaded_file($_FILES['images']['tmp_name'][$i], $fullpath);
}
?>

