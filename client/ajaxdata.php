<?php

include ('../contractor/db/connect.php');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query =$conn->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']."  ORDER BY state_name ASC");
     $query1=$conn->query("SELECT * FROM register WHERE country= ".$_POST['country_id']." and  user_type ='contractor' and status = '1'");
    //Count total number of rows
    $rowCount = $query->num_rows;
    $state_arr = array();
     $cont_arr = array();
    //Display states list
    if($rowCount > 0){
      
        while($row = $query->fetch_assoc()){
        $id = $row['id'];
    $state_name = $row['state_name'];

    $state_arr[] = array("id" => $id, "state_name" => $state_name); 
            //echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
        }
        $data['states']= $state_arr;
        }else{
        echo '<option value="">No Record found1</option>';
    }
 if(  $query1->num_rows > 0){
         while($rows = $query1->fetch_assoc()){
        $con_id = $rows['u_id'];
    $business_name= $rows['business_name'];

    $cont_arr [] = array("con_id" => $con_id, "business_name" => $business_name); 
            
        }
$data['contractor']= $cont_arr ;

                 //echo json_encode($us_arr);
    }else{
        //echo '<option value="">No Record found2</option>';
    }
  
echo json_encode($data);
}




if(isset($_POST["service"]) && !empty($_POST["service"])){
    //Get all state data
   $service= $_POST['service'];
   if($service == 'all'){
    $q="SELECT distinct(business_name),u_id FROM register WHERE user_type ='contractor' and status = '1'";
   }
    elseif($service == 'fav'){
 echo $client_id=  $_SESSION['client_id'];
 echo $q="SELECT distinct(business_name),u_id FROM register WHERE u_id IN (SELECT contractor_id FROM fav  WHERE client_id = '$client_id')";
   }
   else{
   
   $q="SELECT distinct(business_name),u_id FROM register WHERE service = '$service' and  user_type ='contractor' and status = '1'";
   }
   
 
    $query = $conn->query($q);
    
    //Count total number of rows
     $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Contractor</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['u_id'].'">'.$row['business_name'].'</option>';
        }
    }else{
        echo '<option value="">No record found</option>';
    }
    
}






if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $conn->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."  ORDER BY city_name ASC");
      $query1=$conn->query("SELECT * FROM register WHERE state= ".$_POST['state_id']." and  user_type ='contractor' and status = '1'");
    //Count total number of rows
    $city_arr = array();
     $cont_arr = array();
    if( $query->num_rows > 0){
       // echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
        
        $city_id = $row['id'];
    $city_name= $row['city_name'];

    $city_arr [] = array("id" => $city_id , "city_name" => $city_name); 
        
           
        }
        $data['city']= $city_arr ;
        
    }else{
       // echo '<option value="">City not available</option>';
    }
     if(  $query1->num_rows > 0){
         while($rows = $query1->fetch_assoc()){
        $con_id = $rows['u_id'];
    $business_name= $rows['business_name'];

    $cont_arr [] = array("con_id" => $con_id, "business_name" => $business_name); 
            
        }
$data['contractor']= $cont_arr ;

                 //echo json_encode($us_arr);
    }else{
        //echo '<option value="">No Record found2</option>';
    }
    
  echo json_encode($data);  
}

if(isset($_POST["city_id"]) && !empty($_POST["city_id"])){
    //Get all city data
   
      $q1="SELECT * FROM register WHERE city= ".$_POST['city_id']." and  user_type ='contractor' and status = '1'";
    //Count total number of rows
   
  $query = $conn->query($q1);
    
    //Count total number of rows
     $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Contractor</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['u_id'].'">'.$row['business_name'].'</option>';
        }
    }else{
        echo '<option value="">No record found</option>';
    }
} 


?>