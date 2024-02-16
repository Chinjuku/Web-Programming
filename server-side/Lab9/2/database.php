<?php
    error_reporting(E_ERROR | E_PARSE);
    $conn = mysqli_connect("localhost", "S052M", 'TH60375', "s052m");
    // $conn = mysqli_connect("localhost", "root", "", "webpro", 3306);
    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
?>