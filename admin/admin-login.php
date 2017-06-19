<?php
include ('../connect.php');


 $password = $_POST['password'];
  $email= $_POST['email'];

  $query = "select * from admin_user where email='$email' AND password='$password'";  
 
 $ex = mysqli_query($conn, $query);
if (mysqli_num_rows($ex) > 0) {
    $row = mysqli_fetch_array($ex);
    $pass = $row['password'];
if( $password == $pass) 
   {
    
      $_SESSION['admin_id'] = $row['admin_id'];
      $_SESSION['email'] = $row['email'];
       $_SESSION['business_name'] = $row['name'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['type'] = $row['user_type'];
        $_SESSION['Login'] = true;
      if($_SESSION['type']=='admin'){
     
      header("Location: admin-contractor.php");
      }
    } 
    else {
    	
   
header("location:index.php?error=1");
               
          }   
}else{
header("location:index.php?error=1");
}
?>
