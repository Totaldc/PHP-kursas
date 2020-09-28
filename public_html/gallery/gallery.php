<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <section class="gallery-links">
            <div class="wrapper">
                <h2>Gallery</h2>

                <div class="gallery-container">
                    <?php
                include_once 'includes/dbh.inc.php';

                $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt, $sql)){
                    print "SQL statement failed";
                } else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)){
                        print '<a href="#">
                        <div style="background-image: url(img/gallery/' . $row['imageFullNameGallery'] .');"></div>
                        <h3>' . $row['titleGallery'] .'</h3>
                        <p>' . $row['descGallery'] . '</p>
                    </a>';
                    }
                }
                    ?>
                </div>

                <section class="gallery-upload">
                    <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filename" placeholder="File name...">
                        <input type="text" name="filetitle" placeholder="Image title...">
                        <input type="text" name="filedesc" placeholder="Image description...">
                        <input type="file" name="file">
                        <button type="submit" name="submit">Upload</button>
                    </form>
                </section>

            </div>
        </section>
    </main>

</body>

</html>