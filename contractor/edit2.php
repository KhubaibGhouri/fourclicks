<?php require_once('db/connect.php'); 
if ( isset($_GET['edit2']) ) {
    $id = $_GET['edit2'];
    $result=mysqli_query($conn,"SELECT * FROM coder WHERE id='$id'");
    $row= mysqli_fetch_array($result);
}
if(isset($_POST['update1']))
{
 $BusinessName2 = $_POST['BusinessName'];
 //$Filename = $_POST['Filename'];
 
 $start = $_POST['start'];
 $end =  date("Y-m-d", strtotime($_POST['end']));
 //$File= $_POST['file'];

 
  //$file       = $_POST['file'];
if($_POST['Trainingname1'] != 'other')
	{
	$Trainingname = $_POST['Trainingname1'];
	}else{
	$Trainingname = $_POST['Trainingnameother'];
	}
    $EmployeeName = $_POST['EmployeeName1'];

if(!empty($_POST['file_status'])) {
    foreach($_POST['file_status'] as $check) {
     $array[] = $check;
      
           //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
      $file_status=implode($array, ",");
}
 

 //$sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2',Filename='$Filename', Documenttype='$select',startdate='$start',enddate='$end',File='$File' WHERE ID='$id'";

  $sqlupdate = "UPDATE coder SET BusinessName='$BusinessName2', Trainingname='$Trainingname',EmployeeName='$EmployeeName',startdate='$start',enddate='$end',file_status = '$file_status' WHERE ID='$id'";

if (mysqli_query($conn, $sqlupdate)) {
   // if ($conn->query($sqlupdate) === TRUE) {
       header("Location: index.php?update=done");
   // echo "updates";
   } 
   else 
   {
      echo "Error updating record: " . mysqli_error($conn);
   }

}

 ?>

<?php
    @include('../header1.php');
?> 
<div class="container form_pad_adj">
    <h2>Edit File</h2>
    <hr>
 <form action="#" id="testing" enctype="multipart/form-data" method="POST">
  <div class="form-group">
                                       <label for="business">Business Name</label>
                                       <input class="form-control" name="BusinessName" type="text" value="<?php echo $row['BusinessName'];?>"" readonly />
                               </div>
                                <div class="form-group">
                        <label for="Users">Employee Name</label>
                        <input type="text" class="form-control" name="EmployeeName1"value="<?php echo $row['EmployeeName'];?>" />
                    </div>
                                <div class="form-group">
                    <label for="name">Training Type</label>
                      
                        
                         <select name="Trainingname1" class="form-control"  id="dropdown" required="">
                          <option value="<?php echo $row['Trainingname'];?>"><?php echo $row['Trainingname'];?></option>
    <?php
		      	$result = "SELECT * FROM  `training_type` ORDER BY t_name";
				$sql = $conn->query($result);
					
					
	                while($rowss = $sql->fetch_assoc()) { 
	                 
                                          echo  '<option value="'.$rowss['t_name'].'">'.$rowss['t_name'] .'</option>';
                                                                        }?>
                                                                 
    <option value="other">other</option>
  </select>
		        </div>                      

    <div class="form-group" id="textboxDiv"> </div>
                        
  
                    <div class="form-group">
                        <label for="Startdate">Start Date</label>
                         <input id="datepicker003"  class="form-control" class="datepicker" type="text" name="start" value="<?php echo $row['Startdate'];?>" /> 
                    </div>
                    <div class="form-group">
                        <label for="Enddate">Expiry / Refresher Date</label>
                 <input id="datepicker004"  class="form-control" class="datepicker" type="text" name="end" value="<?php echo date('d-m-Y', strtotime($row['Enddate']));?>" />
                    </div>  
 <div class="form-group">
        <label for="sel1">Document Visible to </label>
        <select  name="file_status[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple" >
       
        <?php
        
        $result = "SELECT business_name,u_id, COUNT( * ) 
  FROM  `register` where user_type ='client'
  GROUP BY business_name";

        $sql = $conn->query($result);
        if ($sql->num_rows > 0) {
          while ($rows = $sql->fetch_assoc()) {
                     ?>
                <option value='<?php echo $rows['u_id']?>'><?php echo $rows['business_name']?></option>
            <?php
             }
              }
        ?>
        </select>
  </div>
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="update1">Update</button>
    </div>
</form>
</div>

<?php
    @include('../footer1.php');
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 <script>
   $(function() {
    $( "#datepicker003, #datepicker004, #datepickers101, #datepickersl" ).datepicker({dateFormat: 'dd-mm-yy'});
});

$(document).ready(function() {
    $("#dropdown").change(function() {
        var selVal = $(this).val();
        $("#textboxDiv").html('');
        if(selVal == 'other') {
            
                $("#textboxDiv").append('<label for="name">Enter Training Type</label><input type="text" class="form-control" name="Trainingnameother" value="" />');
            
        }
    });
});
</script>
<script src="js/multi-select.js"></script>
<link rel="stylesheet" href="css/multi-select.css">
  <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>