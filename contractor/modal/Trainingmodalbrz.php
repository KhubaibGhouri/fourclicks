<?php

// session_start();
if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];

  }
if (isset($_POST['submit'])) {
	$start = $_POST['start'];
  $_POST['end'];
$end =  date("Y-m-d", strtotime($_POST['end']));


	$BusinessName = $_POST['BusinessName'];
	//$file 		  = $_POST['file'];
	if($_POST['Trainingname1'] != 'other')
	{
	$Trainingname = $_POST['Trainingname1'];
	}else{
	$Trainingname = $_POST['Trainingnameother'];
	}
    $EmployeeName = $_POST['EmployeeName1'];
    //$SerialNumber = $_POST['SerialNumber'];
        if(!empty($_POST['file_status'])) {
    foreach($_POST['file_status'] as $check) {
     $array[] = $check;
      
           //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
      $file_status=implode($array, ",");
        }
 $filename = $_FILES['file']['name'];
  $tmp1 = explode('.', $filename);
  $extension = end($tmp1);
   $myFile1 = $Trainingname.".".$extension;
    $file = str_replace(" ","_", $myFile1);
        $i = 1;
while(file_exists("uploads/".$file))
{           
    $myFile1 = $Trainingname."(".$i.")".".".$extension;
     $file = str_replace(" ","_", $myFile1);
    $i++;
}
    $file_loc = $_FILES['file']['tmp_name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $target = "uploads/";
	$targetdir = $target .$file ;
	$ok = 1;
	$file_ext = explode('.', $file); 
    $file_ext[] = $file_ext;


 $allowed = array('application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint',
'text/plain', 'application/pdf','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/x-gzip','application/x-tar','application/x-tar','application/zip','application/x-compressed-zip','image/jpeg','image/jpg','image/gif','image/png');
   


if (in_array(strtolower($file_type), $allowed)) {



  
	if (move_uploaded_file($_FILES['file']['tmp_name'], $targetdir))
	{
		
$sql = "INSERT INTO coder (Startdate, Enddate, Trainingname, BusinessName, File, EmployeeName,type, size, user_id,file_status)
VALUES ('$start', '$end', '$Trainingname', '$BusinessName', '$file', '$EmployeeName','$file_type', '$file_size', '$user_id','$file_status')";
 if ($conn->query($sql) === TRUE) {
echo "<script> window.location= 'https://fourclicksolutions.com/contractor/index.php?done'; </script>";
  //  $errors[]="<div class='alert alert-success fade in'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New File created successfully</div>";
}
   
} else {
    $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry, there was a problem uploading your file.</div>";
	}

	
 //unset($_POST);
}else{

	 $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry,Invalid file format.</div>";
 }
}



else if (isset($_POST['submit12'])) {


$start = $_POST['start'];
	$end =  date("Y-m-d", strtotime($_POST['end']));
$BusinessName = $_POST['BusinessName1'];
	//$file = $_POST['file'];
	$SerialNumber = $_POST['SerialNumber'];
        $Equipmentname = $_POST['EquipmentName'];
    $SerialNumber = $_POST['SerialNumber'];
       if(!empty($_POST['file_status'])) {
    foreach($_POST['file_status'] as $check) {
     $array[] = $check;
      
           //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
      $file_status=implode($array, ",");
       }
 $filename = $_FILES['file']['name'];
  $tmp1 = explode('.', $filename);
  $extension = end($tmp1);
   $myFile1 = $Equipmentname.".".$extension;
    $file = str_replace(" ","_", $myFile1);
    $i = 1;
while(file_exists("uploads/".$file))
{           
    $myFile1 = $Equipmentname."(".$i.")".".".$extension;
     $file = str_replace(" ","_", $myFile1);
    $i++;
}
    $file_loc = $_FILES['file']['tmp_name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $target = "uploads/";
	$targetdir = $target .$file ;
	$ok = 1;
	$file_ext = explode('.', $file); 
    $file_ext[] = $file_ext;



 $allowed = array('application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint',
'text/plain', 'application/pdf','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/x-gzip','application/x-tar','application/x-tar','application/zip','application/x-compressed-zip','image/jpeg','image/jpg','image/gif','image/png');


if (in_array(strtolower($file_type), $allowed)) {




  
	if (move_uploaded_file($_FILES['file']['tmp_name'], $targetdir))
	{
		
$sql = "INSERT INTO coder (Startdate, Enddate, SerialNumber, BusinessName, File, Equipmentname, type, size, user_id,file_status)
VALUES ('$start', '$end', '$SerialNumber', '$BusinessName', '$file','$Equipmentname', '$file_type', '$file_size', '$user_id','$file_status')";
    if ($conn->query($sql) === TRUE) {
 echo "<script> window.location= 'https://fourclicksolutions.com/contractor/index.php?done'; </script>";
   // $errors[]="<div class='alert alert-success fade in'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New File created successfully</div>";
}
   
} else {
    $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry, there was a problem uploading your file.</div>";
	}

	
 unset($_POST);
}else{

	 $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry,Invalid file format.</div>";
 }

}

?>


<head>
	
  <script>
   $(function() {
    $( "#datepicker003, #datepicker004" ).datepicker({dateFormat: 'dd-mm-yy'});
});
   </script>
 <script>
   $(function() {
    $( "#datepickers020, #datepickers021, #datepickers101, #datepickersl" ).datepicker({dateFormat: 'dd-mm-yy'});
});
   </script> 
<style>
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5 !important;
position: relative;
}
</style> 
</head>
<body>
<div id="Training" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Training</h4>
      </div>
      <div class="modal-body">
        <form action="#" id="testing" enctype="multipart/form-data"  method="POST">
			
                               <div class="form-group">
                                       <label for="business">Business Name</label>
                                       <input class="form-control" name="BusinessName" type="text" value=" <?= $_SESSION['business_name']; ?>" readonly />
                               </div>
                                <div class="form-group">
				        <label for="Users">Employee Name</label>
				        <input type="text" class="form-control" name="EmployeeName1" required="" />
			        </div>
                                <div class="form-group">
					<label for="name">Training Type</label>
				      
				        <select name="Trainingname1" class="form-control"  id="dropdown" required="">
    <option value="">Please Select</option>
      <?php
		      	$result = "SELECT * FROM  `training_type` ORDER BY t_name";
				$sql = $conn->query($result);
					
					
	                while($row = $sql->fetch_assoc()) { 
	                 
                                          echo  '<option value="'.$row['t_name'].'">'.$row['t_name'] .'</option>';
                                                                        }?>
                                                                 
    <option value="other">other</option>
  </select>
		        </div>                      

    <div class="form-group" id="textboxDiv"> </div> 






			        <div class="form-group">
				        <label for="Startdate">Start Date</label>
				         <input id="datepicker003"  class="form-control" class="datepicker" type="text" name="start"  required/> 
			        </div>
			        <div class="form-group">
				        <label for="Enddate">Expiry / Refresher Date </label>
				        <input id="datepicker004"  class="form-control" class="datepicker" type="text" name="end" required="" />
			        </div>
			        	<div class="form-group">
        <label for="sel1">Document shown to </label>
        <select  name="file_status[]" id="dates-field2" class="multiselect-ui form-control" multiple="multiple" >
       
        <?php
        
        $result = "SELECT business_name,u_id, COUNT( * ) 
  FROM  `register` where user_type ='client'
  GROUP BY business_name";

        $sql = $conn->query($result);
        if ($sql->num_rows > 0) {
          while ($row = $sql->fetch_assoc()) {
                     ?>
                <option value='<?php echo $row['u_id']?>'><?php echo $row['business_name']?></option>
            <?php
             }
              }
        ?>
        </select>
  </div>
   
			        <div class="form-group">
				        <label for="Fileupload">File Upload</label>
				        <input type="file" class="form-control" name="file" class="file" name="file" rrequired>
			        </div>
			        
				    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit">Upload</button>
		        </form>
      </div>
      </div>

  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#dropdown").change(function() {
        var selVal = $(this).val();
        $("#textboxDiv").html('');
        if(selVal == 'other') {
            
                $("#textboxDiv").append('<label for="name">Enter Training Type</label><input type="text" class="form-control" name="Trainingnameother" value="" />');
            
        }
    });
});
</script >
<script src="js/multi-select.js"></script>
<link rel="stylesheet" href="css/multi-select.css">
  <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
