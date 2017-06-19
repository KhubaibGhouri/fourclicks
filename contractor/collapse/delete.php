<?php 
$servername   =  "localhost";
$username     =  "fourc385_mangood";
$password     =  "1zsK,MRAc+?7";
$databasename = "fourc385_ytesting";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<?php
if (isset($_GET['del'])) {
      $id=$_GET['del'];

      $sql="DELETE FROM coder WHERE ID='$id'";

     
     if ($conn->query($sql) === TRUE) {
    echo "del record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
 ?>