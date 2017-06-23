<?php
include ('connect.php');

session_start();
$email = ($_POST['email']);
$password = ($_POST['password']);

 $query = "select * from register where email='$email' AND password='$password'";

$ex = mysqli_query($con, $query);
if (mysqli_num_rows($ex) > 0) {
        $row = mysqli_fetch_array($ex);
        $_SESSION['type'] = 'user';
       $_SESSION['user_id'] = $row['u_id'];
        $_SESSION['business_name'] = $row['business_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['expiry_date'] = $row['expiry_date'];
         $_SESSION['service'] = $row['service'];
         $_SESSION['user_type'] = $row['user_type'];
         $_SESSION['amount'] = $row['amount'];
         $cdate = date("Y-m-d");
         $_SESSION['Login'] = true;
         $user_status = $row['status'];
            if( $row['status'] != 1 )
                {
                     header("location:login.php?error=2");
                }
                    elseif($cdate > $row['expiry_date'] )
                      {
                         header("location:login.php?error=3");
            
                    }
                    else
                     {
                      if($_SESSION['user_type']=='client')
                           {
                               $_SESSION['client_id'] = $row['u_id'];
                               header("location:client/index.php");
                            }
                            elseif($_SESSION['user_type']=='contractor')
                            {
                            $_SESSION['contractor_id'] = $row['u_id'];
                            header("location:contractor/index.php");
                            }
                      }
}else{

header("location:login.php?error=1");
}
?>