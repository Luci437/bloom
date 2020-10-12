<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bloom";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbname);

    if(!$conn) {
        die("Connection Failed");
    }