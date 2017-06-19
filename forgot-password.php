<?php 
include ('contractor/db/connect.php');
 @include("header.php"); 

?>


<!DOCTYPE html>
<html>
<style>
.alert {
    padding: 20px;
    background-color: #e51a16;
    color: white;
}

</style>
    <head>
    
    
    <?php


if(!empty($_POST))
{

 $email = ($_POST['email']);
 $result = "select * from register where email='$email'";

$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) { 
        
  
      $name = $row['business_name'];
    
     $remail=$row['email'];
       $password=$row['password'];
      $user_status = $row['status'];
    }
     	if($user_status == 0 )
     	{
      $err = array();	
  $err[] ='Your Account has been deactivated or Expired.Please Contact Admin.'; 
}

else if($user_status != 0 and $email == $remail )
     	{

     $to=$remail;
 
 
  $subject = 'Password Reset';
    
    $headers = "From: Four Click Solutions <info@fourclicksolutions.com >\r\n" . "Reply-To: info@fourclicksolutions.com \r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $message='<html><body>
        <table style="border-collapse: collapse; width:100%; border: 50px solid #eee;">
        
         <tr>
            <td colspan="2" style="text-align:center; color:#34b3f6; border-bottom: 1px solid #ddd; padding-bottom:10px;padding-top:10px;">
                <a href="www.apps.org.my" target="_blank">
                <img height="80" alt="Four Click Solutions" src="https://fourclicksolutions.com/images/logo-construction.png" class="CToWUd"></a>
                <h3 style="padding-top:0px;"></h3>
            </td>
          </tr>
          <tr>
            <th colspan="2" style="text-align: center;  background-color:#333; color:#fff; padding:10px 10px;">
                <h1> Password Reset</h1>
            </th>
          </tr>
          <tr><td style="border: 50px solid #eee; border-bottom-style: none; border-top-style: none;">
        <table style="border-collapse: collapse; width:90%; margin-left:40px;">
         
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Business Name</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($name) . '</td>
          </tr>
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Email</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($remail) . '</td>
          </tr>
          <tr>
            <th style="padding: 15px; text-align: left; border-bottom: 1px solid #ddd;">Password</th>
            <td style="padding: 15px; text-align: center; border-bottom: 1px solid #ddd;">' . strip_tags($password) . '</td>
          </tr>
         
        </table>
        </td></tr>
          <tr>
            <td colspan="2" style="padding: 10px; text-align:center; background-color:#333; color:#fff;">
            <p>Powered by Four Click Solutions</p></td>
          </tr>
        </table>
        
        </body>
        </html>';

    mail($to, $subject, $message, $headers, '-finfo@fourclicksolutions.com ');
$success[] = "Email has been sent.";
  }else{
 $err = array();
echo $err[] ='Invalid Email ID'; 
}
     

  
}else{
$err = array();
$err[] ='Email ID doses not exist'; 
}
}


        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
     
    </head>
    <body>
        <div class="contaier">
            

                <div class="col-md-4"></div>    
                
                            
                                <div class="" id="ahmad">
                                    <div class="modal-dialog">
                                     <?php
  if(isset($err)){
 foreach($err as $error) ;
 ?>
 
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong><?php echo $error; ?></strong>
</div>
<?php  } ?>


  <?php
  if(isset($success)){
 foreach($success as $suc) ;?>
 
  <div class="alert" <?php echo 'style=" background-color: green;"'; ?>>
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong></strong><?php echo $suc; ?>
</div>
<?php } ?>
                                        <form method="post" action="forgot-password.php">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                                                                        
                                                    <h4 class="modal-title"> Forgot Password </h4>
                                                    
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Enter Email:</label>
                                                        <input type="email" name="email" required class="form-control" id="recipient-name">
                                                    </div>

                                                    
                                                    <button class="btn btn-success" style="">Send Email</button> 
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                  </a>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </form>
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->



                             
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->


                                


                                <script src="js/jquery.js" type="text/javascript"></script>
                                <script src="js/jquery.min.js" type="text/javascript"></script>
                                <script src="js/bootstrap.min.js" type="text/javascript"></script>


                                </div>
                                </body>

                                </html>

<?php  @include("footer1.php"); ?>