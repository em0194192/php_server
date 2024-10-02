<?php

    //create a variable, $_FILES is another superglobal that receives multipart form data
    //that's required when FORM HAS FILES
    //datafile here is linked to the name="datafile" on the input type=file
    $tmpName = $_FILES['datafile'];

    //print_r($tmpName); //printed just to show contents of $_FILES

    //echo getcwd(); //gets the current working directory ->WHERE FILES ARE STORED

    //create a variable called path
    $path = "data";
    //need to manually create a folder called data to store the uploaded files on the server
    
    //line below indicates string that includes directory/name for file to be saved on server
    //DIRECTORY_SEPARATOR grabs \ or / appropriately
    $fileName = $path . DIRECTORY_SEPARATOR . $tmpName['name'];
    echo $fileName;

    //moves the file to the folder
    $success = move_uploaded_file($tmpName['tmp_name'], $fileName);
    if ($success) echo ("Yah!");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .parent {display:flex;}
        .child {width: 200px; margin: 0px 5px; background-color: lightgray; padding:25px}
    </style>
</head>
<body>
    <h1>My Upload Page</h1>
    <div class="parent">
        <?php
        $file = fopen($fileName, 'r');
        $stocks = array();
        while (!feof($file))
        {
            $stock = fgetcsv($file);

            if ($stock === false) continue;
            $stocks[] = $stock;
        }

        foreach($stocks as $stock)
        {
            $strQuotes = "<div class='child'><div>Company: ${stock[1]}</div><div>Price: ${stock[2]}</div>  </div>";

            echo $strQuotes;
        }
        ?>
</body>
</html>