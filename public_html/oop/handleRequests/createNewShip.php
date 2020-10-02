<?php
require_once '../init.php';

// 1. Panaudoti formos duomenis, jog sukurti Laivą
$count = count($_FILES['images']['name']);
$imgPaths = [];
for ($i = 0; $i < $count; $i++) {
  $fileName = "fileUpload_" . $_FILES['images']['name'][$i];
  $fullPath = '../assets/images/' . $fileName;
  move_uploaded_file($_FILES['images']['tmp_name'][$i], $fullPath);
  $imgPaths[] = DOMAIN_NAME .  IMAGES . $fileName;
}
$ship = new Ship($_POST['brand'], $_POST['model'], intval($_POST['roomCount']), $_POST['description'], $imgPaths);
var_dump($ship);


// 2. Parašyti metodą FileDataBase klasėje, jog kuris papildytų failą duomenimis
// 3. Grąžinti atsakymą, jog veiksmai atlinkti sėkmingai
// 4. Javascript faile, kuriame buvo siųstas requestas, nunaviguoti į pagrindinį puslapį