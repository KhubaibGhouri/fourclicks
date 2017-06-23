<?php
include ('connect.php');
?>
<?php  @include("header.php"); ?>
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
     
    </head>
    <body>
        <div class="contaier">
            

                <div class="col-md-4"></div>    
                
                            
                                <div class="" id="ahmad">
                                    <div class="modal-dialog">
                                    <?php
  if($_GET['error']==1){
?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Invalid Email or Password !  </strong>
</div>
<?php } 
 if($_GET['error']==2){
?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Your Account is Inactive. Please Activate   !  </strong>
</div>
<?php } 
 if($_GET['error']==3){
?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Your Account has been Expired!  </strong>
</div>
<?php } ?>
                                        <form method="post" action="user-login.php">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                                                                        
                                                    <h4 class="modal-title"> Login </h4>
                                                    
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Enter Email:</label>
                                                        <input type="email" name="email" required class="form-control" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Password:</label>
                                                        <input type="password" name="password" required class="form-control" id="recipient-name">
                                                    </div>

                                                    <button class="btn btn-success" style="">Login </button> 
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                   <a href="forgot-password.php"> <button type="button" class="btn btn-default" data-dismiss="modal" >Forgot Password</button></a>

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