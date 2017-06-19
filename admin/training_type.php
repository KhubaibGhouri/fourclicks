<?php 
session_start();
if( $_SESSION['type']!='admin' and !$_SESSION['Login']){
    header("location:index.php");
}

@include("../header1.php");
@include("../contractor/db/connect.php");
?>

<div class="container-fluid">
  <?php @include("admin-sidebar.php"); ?>

    <?php
if(isset($_GET['edit_id']))
{     
$edit_id= $_GET['edit_id'];	
    $result1 = "SELECT * FROM  `training_type` where t_id= '$edit_id'";
				$sql1 = $conn->query($result1);
				
					if ($sql1->num_rows > 0) {
					
	                while($rows = $sql1->fetch_assoc()){
			
	            $t_name= $rows['t_name'];
   $serid= $rows['t_id'];
}}}


                        if(isset($_POST["submit"]) || isset($_POST['btn-update']) ) 
                        {
                        
                        $t_name= $_POST['t_name'];
                        }

if(isset($_GET['update_id']))
{ 
$update_id= $_GET['update_id'];

 $sqlupdate = "UPDATE training_type SET t_name='$t_name'  WHERE t_id='$update_id'";
if (mysqli_query($conn, $sqlupdate)) {


$URL="training_type.php?u=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

if(isset($_GET['delete_id']))
{ 
$delete_id= $_GET['delete_id'];

 $sqlupdate = "DELETE from training_type WHERE t_id='$delete_id'";
if (mysqli_query($conn, $sqlupdate)) {


$URL="training_type.php?d=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}
if(isset($_POST["submit"]))
{ 

$sql = "INSERT INTO training_type (t_name) VALUES ('" .$t_name."')";
    if ($conn->query($sql) === TRUE) {
    	
$URL="training_type.php?a=done";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } 		
	    
}

   ?>
   
   
    <div class="col-sm-10">
    
    
<div class="add-service text-center">
	<div class="sign_main_con_adj">
	<h2> Add Training Type</h2>
		<form class="form-horizontal"  action="training_type.php<?php
					if(isset($_GET['edit_id'])) { ?>?update_id=<?php echo $serid; }  ?> " method="post" id="signup-form">
		
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Training Type:</label>
		    <div class="col-sm-6">
		    <input type="text" class="form-control"   name="t_name" required="" id ="t_name" value="<?php if(isset($_GET['edit_id'])) echo $t_name; ?>">
		       
		    </div>
		  </div>
		 
		
		  
		    

		
	


	  <?php
						  if(isset($_GET['edit_id']))
							{
							?><button id="btn-update" type="submit" value="btn-update" class="btn btn-success" name="btn-update">Update</button>
							<?php
							}
							else
							{
								?><button id="send" type="submit" name="submit" value="submit" class="btn btn-success">Submit</button><?php
							}
						?>	
		
	</div>
</div>

</form>
    
    
    
    	<p class="para_adj">Service List</p>
     	<table class="table tabl_pad">
     	<form action="" Method="POST">
		      <tbody>
		      <tr>
		       <th>Sr.</th>
		        <th>Service Name</th>
		         <th>Action</th>
		        
		      </tr>
		      <?php
		      		
    $result = "SELECT * FROM  `training_type` ";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
					$i='0';
	                while($row = $sql->fetch_assoc()) { $i++;?>   
		      <tr>
		       <td><?= $i; ?></td>
		       
		        <td><?= $row['t_name'] ; ?></td>
		       
		         	<td>
               <a href="training_type.php?edit_id=<?php echo $row['t_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> Edit
              </a>
              
              
               <a onclick="javascript:confirmationDelete($(this));return false;" href="training_type.php?delete_id=<?php echo $row['t_id']; ?> " class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
     
                        	</td> 
		       
		        
		      </tr>
		    <?php }}?>
		    </tbody>
		  </table>

      </form>
      
     
    </div>
  </div>
</div>







<?php 
@include("../footer1.php");
?>
 <script>
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
  </script>