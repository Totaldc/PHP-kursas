<?php

if (isset($_POST['submit'])) {

    $newFileName = $_POST['filename'];
    if ($_POST['filename']) {
        $newFileName = 'gallery';
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $tempName = $file['temp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize > 2000) {
            } else {
                print 'File is too big';
            }
        } else {
            print 'You had an error';
        }
    } else {
        print 'You need to upload aproper file type';
        exit();
    }
}
