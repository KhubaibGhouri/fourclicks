<?php

include ('../contractor/db/connect.php');

if(isset($_POST["con_id"]) && !empty($_POST["con_id"])){
    //Get all state data
$con_id=  $_POST['con_id'];
$client_id=  $_SESSION['client_id'];
$q= "SELECT * FROM fav  WHERE client_id = ".$client_id." and contractor_id = ".$con_id."";
   $query =$conn->query($q);
    if($query->num_rows  == 0){
 $sql = "INSERT INTO fav (contractor_id,client_id) VALUES ('$con_id', '$client_id')";
    if ($conn->query($sql) === TRUE) {
      echo "done";
    }
  }else{
    echo "already exist";
  }
    

}

if(isset($_POST["delete_id"]) && !empty($_POST["delete_id"])){
    //Get all state data
$con_id=  $_POST['delete_id'];
$client_id=  $_SESSION['client_id'];
$q= "SELECT * FROM fav  WHERE client_id = ".$client_id." and contractor_id = ".$con_id."";
   $query =$conn->query($q);
    if($query->num_rows > 0){
 $sql = "DELETE FROM fav  WHERE client_id = ".$client_id." and contractor_id = ".$con_id."";
    if ($conn->query($sql) === TRUE) {
      echo "delete";
    }
  }else{
    echo "does not  already exist";
  }
    

}
?>