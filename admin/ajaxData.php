<?php

include ('../contractor/db/connect.php');


if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = $conn->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']."  ORDER BY state_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}


if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $conn->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."  ORDER BY city_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>