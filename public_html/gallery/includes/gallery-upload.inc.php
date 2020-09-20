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
            if ($fileSize > 200000) {
                $imgFullName = $newFileName . "." . uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = 'img/gallery/' . $imgFullName;


                include_once 'dbh.inc.php';

                if (empty($imageTitle) || empty($imageDesc)) {
                    header('Location: ../gallery.php?upload=empty');
                    exit();
                } else {
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        print 'SQL statement failed';
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;
                    }
                }
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
