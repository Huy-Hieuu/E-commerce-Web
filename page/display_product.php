<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'onlinestore';
    $port = '4306';

    $conn = mysqli_connect($servername, $username, $password,$database, $port);

    $productID = $_GET['productID'];
    // retrieve product image from database
    $query = "SELECT productImage FROM product WHERE productID = " . $productID;
    $result = mysqli_query($conn, $query);

    // check if query was successful
    if ($result) {
    // check if product exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $imageData = $row["productImage"];

            // set the content-type header based on the image type
            header("Content-type: image/jpeg");

            // output the image data
            echo $imageData;
        } else {
            // product not found
            echo "Product not found.";
        }
        } else {
        // error executing query
        echo "Error executing query: " . mysqli_error($conn);
    }
    $conn -> close();
    
?>