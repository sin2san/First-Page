<?php

    // Defining connection variable (globally)
    global $connection;

    // Declaring database details
    $database_name = "ecommerce";
    $database_hostname = "localhost";
    $database_username = "root";
    $database_password = "";

    $connection = mysqli_connect($database_hostname, $database_username, $database_password, $database_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect mysql : " . mysqli_connect_error();
    }

?>