<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";

    $dbName = "sms";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn) {
      die("Connection Failed:" . mysqli_connect_error());
    }
    
    
    
    // // Check the connection
    // if (mysqli_connect_errno()) {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //     exit();
    //   }


    // $conn = mysqli_connect($serverName, $userName, $password);
    // $db = mysqli_select_db($conn, $dbName);

?>