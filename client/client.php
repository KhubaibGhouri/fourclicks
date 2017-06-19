<?php
include ('../contractor/db/connect.php');

if($_SESSION['user_type'] != "client"){
	
    header("location:../login.php");
}

?>
<?php  @include("../header1.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>


   
    
    
<link rel="stylesheet" href="../contractor/assets/frontend.css">


<link rel="stylesheet" href="../contractor/assets/font-awesome.min.css">
<link rel="stylesheet" href="../contractor/assets/grid.css">
<link rel="stylesheet" href="../contractor/assets/jquery-ui.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <link rel="stylesheet" href="../contractor/assets/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
<script type="text/javascript" src="filter.js"></script>


	<style>
	.abc tbody tr th {
    background: #D8E5ED !important;
}
.btn-default{
color : black;
}
	</style>
	
	 <style type="text/css">
    	.tick{   
    	    border: 3px solid #009300;
    border-radius: 5px;
    color: #009300;
    }
    .cross{   
    	    border: 3px solid #FE0000;
    border-radius: 5px;
    color: #FE0000;
    }
    
    .box-comapny {
    width: 100%;
    float: left;
}

.compny-wrap {
    width: 100%;
    max-width: 50%;
    margin: 0px auto;
}

button.btn.btn-info.btn-abc {
    margin-top: 28px;
    border-radius: 5px;
    margin-left: 18px;
}

.wraper {
    width: 100%;
    
    margin: 0px auto;
}
    </style>
	<script type="text/javascript">
$(document).ready(function() {
  $("#js-example-basic-single").select2();
});
</script>
</head>
<body>
<div class=" container-fluid row-img-12-best">



<?php

// if (isset($_POST['submit'])) {
// 	$name = $_POST['names'];
//         $search = $_POST['search'];
// 	echo $name;
// } 
?>
 <div class="wraper">
 <div class="col-sm-12 " style="padding: 25px;border: solid 1px #ccc;margin-top: 15px;">
 <form action="#" method="POST" style="padding-bottom: 20px";>
  <div class="col-sm-3">
                            <div class="form-group">
                       <label for="sel1">Country</label>
			<select  name="names" class="form-control"  id="country" >
			 <option value=''>Select Country</option>
			<?php
			 $date = date("Y-m-d");
			$result = "SELECT * FROM countries ORDER BY country_name ASC";

			$sql = $conn->query($result);
			if ($sql->num_rows > 0) {
				while ($row = $sql->fetch_assoc()) {
									 ?>
					    <option value="<?php echo $row['id']?>"><?php echo $row['country_name']?></option>
					<?php
					 }
			      }
			?>
			</select>
			</div>
			</div>
			<div class="col-sm-3">
                            <div class="form-group">
                       <label for="sel1">State</label>
			<select  name="state" class="form-control"  id="state" >
			
    <option value="">Select country first</option>
</select>
			</select>
			</div>
			</div>
			
			<div class="col-sm-3">
			   <label for="sel1">City</label>
                            <select name="city" id="city"  class="form-control">
    <option value="">Select state first</option>
</select>
			</div>
			<div class="col-sm-3">
                            <div class="form-group">
                       <label for="sel1">Services</label>
			<select  name="names" class="form-control"  id="service" >
			 <option value=''>Select Service Type</option>
			<?php
			 $date = date("Y-m-d");
			$result = "SELECT distinct service FROM register where user_type ='contractor' and status = '1' ORDER BY service ASC";

			$sql = $conn->query($result);
			echo '<option value="all">All Services</option>';
			if ($sql->num_rows > 0) {
				while ($row = $sql->fetch_assoc()) {
									 ?>
					    <option value="<?php echo $row['service']?>"><?php echo $row['service']?></option>
					<?php
					 }
			      }
			?>
			</select>
			</div>
			
			
			</div>
		<div class="box-comapny">
			<div class="compny-wrap">

			<div class="col-sm-10">
			<label for="sel1">Contractor</label>
			
			<select  class="form-control" name="names" id="contratcor">
			
  
    <?
     $q="SELECT distinct(business_name),u_id From register WHERE  user_type ='contractor' and status = '1'";
    $query = $conn->query($q);
    
    //Count total number of rows
     $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select contratctor</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['u_id'].'">'.$row['business_name'].'</option>';
        }
    }else{
        echo '<option value="">No record found</option>';
    }
    ?>
</select>
			
			
			</div>
			
	    <button type="submit" name="submit" class="btn btn-info btn-abc">Search</button>
	</form>
	</div>
	</div>

</div>
</div>
<br>	
<?php if(isset($_POST['names']))
{

				$name = $_POST['names'];

				$result1 = "SELECT * FROM register WHERE u_id='$name'";

				$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					Foreach ($sql1 as $rows ) ; 
	?>
<div class="container constrct_margin_adj">
  <h3 class="text-center">Contact Details</h3>
  <table class="table abc">
    <tbody>
    <tr>
    <th>Company Name</th>
    <th>Service</th>
    <th>Email</th>
    <th>Phone  No</th>
    <th>Mobile No</th>
    </tr>
    <tr>
    <td><?= $rows['business_name'] ;?></td>
    <td><?= $rows['service'] ;?></td>
      <td><?= $rows['email'] ;?></td>
    <td><?= $rows['phone']; ?></td>
    <td><?= $rows['mobile']; ?></td>
    </tr>
    </tbody>
  </table>
</div>
<?php } }?>

<div class="col-md-12">
	<div class="row">
		<div class="col-sm-4">
			<div class="img-box">
		<img src="../img/Insurance_library.jpg">
			
		</div>
		</div>
		<div class="col-sm-4">
			<div class="img-box">
		<img src="../img/Training-Library.jpg" >
		</div>	
		</div>
		<div class="col-sm-4">
			<div class="img-box">
			<img src="../img/Equipment_Library.jpg">
		</div>
		</div>
	</div>
</div>
	<div class="row">
	 	<div class="col-md-4">
	 		<h2 class="Lib1">Insurance and Risk</h2>
			<?php
			if (isset($_POST['names'])) {
				$name = $_POST['names'];
 $date = date("Y-m-d");
				 $result = "SELECT * FROM coder WHERE user_id='$name' and Enddate > '$date' and Documenttype != ''";

				$sql = $conn->query($result);
				if ($sql->num_rows > 0) {
					while ($row = $sql->fetch_assoc()) {
					
					?>
			     
	                
	                 <div>
	                 	<!-- <div class="collapse" id="collapseExample4-<?php echo $row['ID'];?>"> -->
	                 	<?
	                 	$result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where Documenttype='Public Laibility Insurance' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						?>
						  <button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo7654-<?php echo $row['ID'];?>">Public Liability Insurance (<?=$sql->num_rows; ?>) </button><br>
						  <div id="demo7654-<?php echo $row['ID'];?>" class="collapse">
	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php
                                                
						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				               
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>

						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Indemnity Insurance' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo820-<?php echo $row['ID'];?>">Indemnity Insurance (<?=$sql->num_rows; ?>) </button><br>
					    <div id="demo820-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							  
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				             
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						
						$result = "SELECT * FROM coder WHERE user_id='$name' AND  Documenttype='Worker Comp insurance' and Enddate > '$date'";

						$sql = $conn->query($result);?>
						<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo7-<?php echo $row['ID'];?>">Worker Comp Insurance (<?=$sql->num_rows; ?>) </button><br>
					    <div id="demo7-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
					
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						
						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Risk Assesment' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo800-<?php echo $row['ID'];?>">General Risk Assessment (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo800-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Fire Risk Assessments' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo1800-<?php echo $row['ID'];?>">Fire Risk Assessment (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo1800-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Chemical Risk Assessments' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo9800-<?php echo $row['ID'];?>">Chemical  Risk Assessment (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo9800-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Safe Work Method Statement' and user_id='$name' and Enddate > '$date'";

						$sql = $conn->query($result);
						
						?>
						<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo009-<?php echo $row['ID'];?>">Safe Work Method Statement (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo009-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				              
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
					</div>
				    </div>

					<?php
				}
			}}
	       
	       ?>
	</div>
	 	<div class="col-md-4">
	 		<h2 class="Lib1">Training</h2>


					 	  <?php   
      if (isset($_POST['names'])) {
				$name = $_POST['names'];
          $date = date("Y-m-d");                         

	$result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName,EmployeeName FROM  `coder` where Enddate >'$date' and TrainingName != '' and user_id='$name'  GROUP BY EmployeeName";
				
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) { 

$EmployeeName = $row['EmployeeName'];
  $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where  user_id='$name'and Enddate>'$date' and TrainingName != '' and  EmployeeName = '$EmployeeName' ";

                $sql2 = $conn->query($result2);
	                	?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample412-<?php echo $row['ID']; ?>" aria-expanded="false" aria-controls="collapseExample">Contractor <?php echo $row['EmployeeName']; ?>  (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample412-<?php echo $row['ID']; ?>">
                        <?php
echo "<table class='table'><tr>";
echo '<td width="25">File Name</th>';
echo '<th width="25">Training Type</th>';
echo '<td width="30">Start Date</th>';
echo '<td width="30">End Date</th>';
echo "</tr>";

$date = date("Y-m-d");  

                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
                    	 $row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate']));

    echo "<tr>";
    echo "<td><a href='../contractor/uploads/$row2[File]'>$row2[File]</a></td>";
     echo "<td>$row2[TrainingName]</td>";
    echo "<td>$row2[Startdate]</td>";
    echo "<td>$row2[Enddate]<br></td>";
        echo "</tr>"; ?>
               
            <?php }?>

        <?php  }
            echo '</table>';?>

             
                    </div>    
	        <?php
echo "</table>"; }?>
	    <?php  }}?>

	       </div>
               <div class="col-md-4">
	 		<h2 class="Lib1">Equipment</h2>
                        <?php   
      if (isset($_POST['names'])) {
				$name = $_POST['names'];
$date = date("Y-m-d");  

				$result = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname FROM  `coder` where SerialNumber!= ''
				 and user_id='$name'  and `Equipmentname` != '' and  Enddate > '$date' GROUP BY Equipmentname";
				
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) { 
	                
	                $Equipmentname = $row['Equipmentname'];
   $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname,doc_status FROM  `coder` where user_id='$name' and  SerialNumber!= '' and  Equipmentname = '$Equipmentname' and Enddate > '$date' ";
 $sql2 = $conn->query($result2);
	                ?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample4212-<?php echo $row['ID']; ?>" aria-expanded="false" aria-controls="collapseExample"> <?php echo $row['Equipmentname']; ?> (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample4212-<?php echo $row['ID']; ?>">
                        <?php
echo "<table class='table'><tr>";
echo '<td width="25">File Name</th>';
echo '<td width="25">Serial Number</td>';
echo '<td width="30">Start Date</th>';
echo '<td width="30">End Date</th>';
echo '<td width="30">Status</th>';
echo "</tr>";



               
                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
                    	$row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate'])); 

    echo "<tr>";
    echo "<td><a href='../contractor/uploads/$row2[File]'>$row2[File]</a></td>";
    echo "<td>$row2[SerialNumber]</td>";
     echo "<td>$row2[Startdate]</td>";
    echo "<td>$row2[Enddate]<br></td>";
     if($row2['doc_status']=="Pass"){
   echo "<td><span class='glyphicon tick'>&#xe013;</span></td>";
   }else if($row2['doc_status']=="Fail")
   {
   echo "<td><span class='glyphicon cross'>&#xe014;</span></td>";
   }else{
   echo "<td>N/A</td>";
   }
    
        echo "</tr>"; ?>
               
            <?php }?>

        <?php  }
            echo '</table>';?>

             
                    </div> 
	        <?php
echo "</table>"; }?>
	    <?php  }}?>

	      
	       </div>
	       </div>

         <div class="row">

	 	<div class="col-md-4">
	 		<h2 class="Lib1">EXPIRED  Documents</h2>
			<?php
			if (isset($_POST['names'])) {
				$name = $_POST['names'];

				$result = "SELECT * FROM coder WHERE user_id='$name' and Enddate < '$date' and Documenttype != ''";

				$sql = $conn->query($result);
				if ($sql->num_rows > 0) {
					while ($row = $sql->fetch_assoc()) {{?>
			      
	                 <div>
	                 	<!-- <div class="collapse" id="collapseExample4-<?php echo $row['ID'];?>"> -->
	                 	<?
	                 	$date = date("Y-m-d");
						$result = "SELECT * FROM coder WHERE user_id='$name' AND  Documenttype='Public Laibility Insurance' AND Enddate <  '$date'";

						$sql = $conn->query($result);

	                 	?>
						  <button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo971-<?php echo $row['ID'];?>">Public Liability Insurance (<?=$sql->num_rows; ?>)</button><br>
						  <div id="demo971-<?php echo $row['ID'];?>" class="collapse">
	                    <table class="table">
						<thead>
							<tr>
							    <th>Name</th>
								<th>File</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

//$date = date("Y-m-d");
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                <td width="40px">Contrator <?php echo $row['Name']?> </td>
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						
						$result = "SELECT * FROM coder WHERE user_id='$name' AND  Documenttype='Worker Comp insurance' AND Enddate <  '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo881-<?php echo $row['ID'];?>">Indemnity Insurance (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo881-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    <th>Name</th>
								<th>File</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

//$date = date("Y-m-d");
$date = date("Y-m-d");


						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                <td width="40px">Contrator <?php echo $row['Name']?> </td>
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						
						$result = "SELECT * FROM coder WHERE user_id='$name' AND  Documenttype='Worker Comp insurance' AND Enddate <  '$date'";

						$sql = $conn->query($result);
						
						?>
						<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo71-<?php echo $row['ID'];?>">Worker Comp Insurance (<?=$sql->num_rows; ?>) </button><br>
					    <div id="demo71-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    <th>Name</th>
								<th>File</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

//$date = date("Y-m-d");
$date = date("Y-m-d");


						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                <td width="40px">Contrator <?php echo $row['Name']?> </td>
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						
						<?
						$result = "SELECT * FROM coder WHERE user_id='$name' AND  Documenttype='Risk Assesment' AND Enddate <  '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo81-<?php echo $row['ID'];?>">General Risk Assessment (<?=$sql->num_rows; ?>) </button><br>
					    <div id="demo81-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    <th>Name</th>
								<th>File</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

//$date = date("Y-m-d");
$date = date("Y-m-d");


						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                <td width="40px">Contrator <?php echo $row['Name']?> </td>
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Fire Risk Assessments' and user_id='$name' and Enddate < '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo8800-<?php echo $row['ID'];?>">Fire Risk Assessment (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo8800-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>

						<?
						$result = "SELECT * FROM coder WHERE Documenttype='Chemical Risk Assessments' and user_id='$name' and Enddate < '$date'";

						$sql = $conn->query($result);
						?>
<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo6800-<?php echo $row['ID'];?>">Chemical  Risk Assessment (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo6800-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							
								<th>File Name</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate'])); ?>
						    <tr>
				                
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
						</div>
						<?
						$result = "SELECT * FROM coder WHERE user_id='$name' AND Documenttype='Safe Work Method Statement' AND Enddate <  '$date'";

						$sql = $conn->query($result);
						?>
						
						
						<button role="button" class="btn btn-default buttontype" data-toggle="collapse" href="#demo91-<?php echo $row['ID'];?>">Safe Work Method Statement (<?=$sql->num_rows; ?>)</button><br>
					    <div id="demo91-<?php echo $row['ID'];?>" class="collapse">

	                    <table class="table">
						<thead>
							<tr>
							    <th>Name</th>
								<th>File</th>
								<th>Start Date</th>
								<th>End Date</th>
		
							</tr>
						</thead>
						<tbody>
						<?php
//$date = date("Y-m-d");
$date = date("Y-m-d");

						
						if ($sql->num_rows > 0) {
							while ($row = $sql->fetch_assoc()) {
									 $row['Enddate'] = date('d-m-Y', strtotime($row['Enddate']));
								?>

						    <tr>
				                <td width="40px">Contrator <?php echo $row['Name']?> </td>
				                <td width="40px"><a href="../contractor/uploads/<?php echo $row['File'];?>" target="_blank"><?php echo $row['File'];?></a></td>
				                <td width="40px"><?php echo $row['Startdate']?> </td>
				                <td width="40px"><?php echo $row['Enddate']?></td>
				            </tr>
						    
						<?php
								}
							}
						?>
						</tbody>
				     </table>
					</div>
				    </div>

					<?php
				}
			}}
	       }
	       ?>
				</div>
				<div class="col-md-4">
					<h2 class="Lib1">EXPIRED  Documents</h2>
				    <?php
 if(isset($_SESSION["user_id"]))
  {
    $user_id = $_SESSION["user_id"];

  }
 $date = date("Y-m-d");
    // $result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName, COUNT( * ) FROM  `coder` GROUP BY EmployeeName";
      $result = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where  Enddate <  '$date' and TrainingName != '' and user_id = '$name' 
     GROUP BY EmployeeName";
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) {
$EmployeeName = $row['EmployeeName'];
    $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,TrainingName, EmployeeName FROM  `coder` where user_id='$name' and  Enddate <  '$date' and TrainingName != '' and user_id = '$name' and  EmployeeName = '$EmployeeName' ";

                $sql2 = $conn->query($result2);
	                 ?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample41-<?php echo $row['ID']; ?>" aria-expanded="false" aria-controls="collapseExample"><?php echo $row['EmployeeName']; ?> (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample41-<?php echo $row['ID']; ?>">
                        <?php
echo "<table class='table'><tr>";
echo '<td width="25">File Name</th>';
echo '<th width="25">Training Type</th>';
echo '<td width="30">Start Date</th>';
echo '<td width="30">End Date</th>';
echo "</tr>";
$date = date("Y-m-d");

                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
                    	$row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate'])); 

    echo "<tr>";
    echo "<td><a href='../contractor/uploads/$row2[File]'>$row2[File]</a></td>";
     echo "<td>$row2[TrainingName]</td>";
    echo "<td>$row2[Startdate]</td>";
    echo "<td>$row2[Enddate]<br></td>";
   
    echo "</tr>"; ?>
               
            <?php }?>

        <?php  }
            echo "</table>";?>             
                    </div>    
	        <?php } }?>
  

				</div>
				
	           <div class="col-md-4">
	 		<h2 class="Lib1">EXPIRED  Documents</h2>
                        <?php   
      if (isset($_POST['names'])) {
				$name = $_POST['names'];
$date = date("Y-m-d");  

				$result = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname FROM  `coder` where SerialNumber!= ''
				 and user_id='$name'  and `Equipmentname` != '' and  Enddate < '$date' GROUP BY Equipmentname 
";
				
				$sql = $conn->query($result);
					if ($sql->num_rows > 0) {
	                while($row = $sql->fetch_assoc()) { 
	                
	                $Equipmentname = $row['Equipmentname'];
    $result2 = "SELECT ID,BusinessName,Startdate,Enddate,File,SerialNumber,Equipmentname,doc_status FROM  `coder` where user_id='$name' and SerialNumber!= '' and  Equipmentname = '$Equipmentname' and  Enddate < '$date' ";

                $sql2 = $conn->query($result2);
	                ?>         
	                   <a class="btn btn-default btn-sm document" role="button" data-toggle="collapse" href="#collapseExample4212-<?php echo $row['ID']; ?>" aria-expanded="false" aria-controls="collapseExample"> <?php echo $row['Equipmentname']; ?> (<?=$sql2->num_rows; ?>)</a><br>
	                 <div  class="collapse" id="collapseExample4212-<?php echo $row['ID']; ?>">
                        <?php
echo "<table class='table'><tr>";
echo '<td width="25">File Name</th>';
echo '<td width="25">Serial Number</td>';
echo '<td width="30">Start Date</th>';
echo '<td width="30">End Date</th>';
echo '<td width="30">Status</th>';
echo "</tr>";



                    if ($sql2->num_rows > 0) {
                    while($row2 = $sql2->fetch_assoc()) { 
                    	$row2['Enddate'] = date('d-m-Y', strtotime($row2['Enddate'])); 

    echo "<tr>";
    echo "<td><a href='../contractor/uploads/$row2[File]'>$row2[File]</a></td>";
    echo "<td>$row2[SerialNumber]</td>";
     echo "<td>$row2[Startdate]</td>";
    echo "<td>$row2[Enddate]<br></td>";
     if($row2['doc_status']=="Pass"){
   echo "<td><span class='glyphicon tick'>&#xe013;</span></td>";
   }else if($row2['doc_status']=="Fail")
   {
   echo "<td><span class='glyphicon cross'>&#xe014;</span></td>";
   }else{
   echo "<td>N/A</td>";
   }
        echo "</tr>"; ?>
               
            <?php }?>

        <?php  }
            echo '</table>';?>

             
                    </div>    
	        <?php
echo "</table>"; }?>
	    <?php  }}?>

	      
	       </div>
</div>	
</body>

<script>
		$('select').on('change', function() {

	})
$(document).ready(function () {
  $(#search).keyup(function(){
   var x = $(this).val();
   $(#sel1).show();
    $.ajax({
  type:'GET',
 url:'https://fourclicksolutions.com/bronze.php',
data:'q='+x,
success:function(data)
  $("#sel1").html(data);
})


});
});
alert("yes");
	</script>
</html>
<?php  @include("../footer1.php"); ?>