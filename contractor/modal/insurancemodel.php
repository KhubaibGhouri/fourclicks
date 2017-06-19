<?php
if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];
  }
  else
  {
    $user_id ="";
  }
if (isset($_POST['submit01'])) {
  
	$name = $_POST['Filename'];
	$start = $_POST['start'];
$end =  date("Y-m-d", strtotime($_POST['end']));
	$BusinessName = $_POST['BusinessName2'];
	//$file = $_POST['file'];
	$Documenttype = $_POST['radio'];
	
if(!empty($_POST['file_status'])) {
    foreach($_POST['file_status'] as $check) {
     $array[] = $check;
      
           //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
      $file_status=implode($array, ",");
}

//echo   $file_status;


 $filename = $_FILES['file']['name'];
 $tmp1 = explode('.', $filename);
  $extension = end($tmp1);
   $myFile1 = $name.".".$extension;
    $file = str_replace(" ","_", $myFile1);
            $i = 1;
while(file_exists("uploads/".$file))
{           
    $myFile1 = $name."(".$i.")".".".$extension;
     $file = str_replace(" ","_", $myFile1);
    $i++;
}
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

    // Save the file
  



	if (move_uploaded_file($_FILES['file']['tmp_name'], $targetdir))
	{

$sql = "INSERT INTO coder (Name, Startdate, Enddate, BusinessName, File, Documenttype, type, size, user_id,file_status) VALUES ('$name', '$start', '$end', '$BusinessName', '$file', '$Documenttype','$file_type', '$file_size', '$user_id','$file_status')";
//$sql = "INSERT INTO coder (Name, Startdate, Enddate, BusinessName, File, Documenttype, type, size, user_id)VALUES ('$name', '$start', '$end', '$BusinessName', '$file', '$Documenttype','$file_type', '$file_size', '$user_id')";
    if ($conn->query($sql) === TRUE) {
    
echo "<script>window.location= 'https://fourclicksolutions.com/contractor/index.php?done'</script>";
  //   $errors[]="<div class='alert alert-success fade in'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New File created successfully</div>";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}    
		 
	}
	else
	{
		 $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry, there was a problem uploading your file.</div>";
	}

	

}else{
 $errors[]= "<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Sorry,Invalid file format.</div>";
 }
 
// header("Location: index.php?delete=done");
    
} 
?>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Documentation</h4>
  </div>
  <div class="modal-body">
    <form action="<?= $_SERVER['PHP_SELF'];?>" id="testing" enctype="multipart/form-data"  method="POST">
 <div class="form-group">
        <label for="business">Business Name</label>

        <input class="form-control" name="BusinessName2" type="text" required="" value=" <?= $_SESSION['business_name']; ?>" readonly/>
    </div>	
<div class="form-group">
		<label for="name">File Name</label>
        <input name="Filename" class="form-control" type="text"   />
    </div>
   		<label for="">Document Type</label>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Public Laibility Insurance">1. Public Liability Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Indemnity Insurance">3. Indemnity Insurance </label>
		</div>
		<div class="radio">
			 <label><input type="radio" name="radio" value="Worker Comp Insurance">2. Works Comp Insurance </label>
		</div> 
		<div class="radio">
			 <label><input type="radio" name="radio" value="Risk Assesment">4. General Risk Assessments  </label>
		</div>
		<div class="radio">
		     <label><input type="radio" name="radio" value="Fire Risk Assessments">5. Fire Risk Assessments </label>
		</div>
		<div class="radio">
		     <label><input type="radio" name="radio" value="Chemical Risk Assessments">6. Chemical Risk Assessments</label>
		</div>
		<div class="radio">
		     <label><input type="radio" name="radio" value="Safe Work Method Statement">5. Safe Work Method Statement </label>
		</div>
    
  
    <div class="form-group">
        <label for="Startdate">Start Date</label>
         <input id="datepickers101" class="form-control" class="datepicker" type="text" name="start" required="" /> 
    </div>
    <div class="form-group">
        <label for="Enddate">Expiry / Refresher Date</label>
        <input id="datepickersl" class="form-control"  class="datepicker" type="text" name="end" required="" />
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
        <input type="file" class="form-control" name="file" class="file" name="file"    required="">
    </div>
    
    <button type="submit" id="submit" class="btn btn-primary submitbutton" name="submit01">File Upload</button>
</form>
</div>
  </div>

</div>
</div>

<script src="js/multi-select.js"></script>
<link rel="stylesheet" href="css/multi-select.css">
  <script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>