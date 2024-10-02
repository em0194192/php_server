<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- notice it's a post and has an enctype, and will return upload.php when done -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- file input gives a browse button -->
        <input type="file" name="datafile" id="datafile">
        <!-- type submit, submits to the server -->
        <input type="submit" value="Upload File">
    </form>
</body>
</html>