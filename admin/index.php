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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="contaier">
            
            <div class="">
             <img class="center-block" src="../images/logo-construction.png">
                <div class="col-md-4"></div>    
                
                                </div>
                                <div class="" id="ahmad">
                                    <div class="modal-dialog">
                                     <?php
  if(isset($_GET['error'])){
?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong> Invalid Email or Password ! 
</div>
<?php } ?>
                                        <form method="post" action="admin-login.php">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    
                                                    <h4 class="modal-title">Admin Login </h4>
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

                                                    <button class="btn btn-success" style="">Login</button> 
                                                    <button type="button" class="btn btn-danger">Reset</button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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

