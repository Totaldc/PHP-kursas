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
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                </div>

                <section class="gallery-upload">
                    <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                       <input type="text" name="filename" placeholder="File name..."> 
                       <input type="text" name="filetitle" placeholder="Image title..."> 
                       <input type="text" name="filedesc" placeholder="Image description...">
                       <input type="file" name="file"  >
                       <button type="submit" name="submit">Upload</button>  
                </form>
                </section>

            </div>
        </section>
    </main>

</body>

</html>