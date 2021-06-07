<?php
    $server_name = "us-cdbr-east-04.cleardb.com";
    $username = "b1677ddbac9b6b";
    $password = "9956ee24";
    $database_name = "heroku_3878a416e4d0bb4";
    
    $conn = mysqli_connect ($server_name, $username, $password, $database_name);
    
    if(!$conn){
        // die("Failed to connect to the database: ".mysqli_connect_error());
        echo("<script type = 'text/javascript'>alert('Error in database connection!')</script>");
    }

?>
