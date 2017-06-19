<?php

include ('contractor/db/connect.php');
$searchVal = $_GET['coupon'];
if($searchVal != "")
{
$date= date("Y-m-d");
    //Get all state data
  $q = "SELECT * FROM cupon WHERE number = '".$searchVal."' and status ='0' and valid_date > '".$date."' ORDER BY id ASC";
     $query = $conn->query($q);
    
    //Count total number of rows
     $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
     $valid = "true";
   }else {
      $valid = "false";
   }
}else
{
 $valid = "true";
}
  echo $valid ;

?>