<?php
session_start();


$servername   =  "localhost";
$username     =  "fourc385_silver";
$password     =  "9+mMd5gCsCFX";
$databasename = "fourc385_silver";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $errors = array();
?>