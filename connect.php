<?php
session_start();

$con = mysqli_connect("localhost","fourc385_silver","9+mMd5gCsCFX","fourc385_silver");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

  
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

?>