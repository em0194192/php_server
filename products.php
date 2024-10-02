<?php

    //create an array with some data in it
    $data = array(
        ['GOOG', 'Google Inc.', '800'],
        ['AAPL', 'Apple Inc.', '500'],
        ['AMZN', 'Amazon.com Inc.', '250'],
        ['YHOO', 'Yahoo! Inc.', '250'],
        ['FB', 'Facebook, Inc.', '30'],
    );

    //create a variable to store the name of the csv file
    $filename = "stock.csv";

    // //create a stream that communicates
    // // open up "$filename" and "write" to it
    // // if the file doesn't exist, it WILL create it for you
    // // if it DOES exist, it will erase it and then replace it entirely
    // $file = fopen($filename, "w");

    // //check that file was written
    // if ($file == false)
    // {
    //     die("Error opening the file $filename"); //die makes APP STOP NOW
    // } else {
    //     echo ("all good");
    // }

    // //loop through the array to write to the csv file
    // foreach($data as $row) //each element of $data is a $row
    // {
    //     fputcsv($file, $row); //changes to csv and writes to $file
    // }

    // //CLOSE the stream once you are done using it
    // fclose($file);

    //Read from the csv file
    //Open a "stream"
    //rb is read only binary -> grabs carriage returns and special characters
    $file = fopen("stock.csv", "rb");

    //
    while(!feof($file)) //feof is looking for "end of file", loop goes until NOT end of file
    {
        $stock = fgetcsv($file); //grabs each line, makes each an array, stores in $stock
        //print_r($stock); //prints through the array
        if ($stock === false) continue; //handles if hit end of file not putting that "falsey" value in the array
        //continue is a keyword that gets out and checks the while condition again, it's now false so we exit the loop entirely
        $stocks[] = $stock; //puts at the end of the array
    }

    //print_r($stocks); //its back to an array of arrays

    foreach ($stocks as $stock)
    {
        echo $stock[0] . "\n";
    }