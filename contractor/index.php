<?php require_once('db/connect.php');?>
<?php 
//session_start();
 
if(!$_SESSION['Login']){
 header("location:../login.php");
 } 
elseif($_SESSION['user_type']!== 'contractor')
{
  header("location:../login.php");  
}
 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>FourClickSolutions</title>

    <!--=====================================
     =            Style Files               =
     ======================================-->      
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" ></link>
   
    <link rel="stylesheet" href="assets/custom.css">
    
    
<link rel="stylesheet" href="../assets/frontend.css">

<link rel="stylesheet" href="assets/dms.css">
<link rel="stylesheet" href="assets/font-awesome.min.css">
<link rel="stylesheet" href="assets/grid.css">

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" ></link>


   <! =============================================
    =            Script File is here              =
    =============================================*/    
    
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
    	.tick{   
    	    border: 3px solid #009300;
 
    color: #009300;
    }
    .cross{   
    	    border: 3px solid #FE0000;
 
    color: #FE0000;
    }
    </style>
  </head>
  
<body>

<?php require_once('modal/Trainingmodalbrz.php');?>
<?php require_once('modal/Equipmentmodel.php');?>
<?php require_once('modal/insurancemodel.php');?>

<! =====  End of Model Files Inculded  ====== !>

<?php  @include("../header1.php"); ?>





<div class="container-fluid testing-col">
<div class="">
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

<!-- <div class="row">
  <form action="" method="POST">
    <div class="form-group">
      <span class="col-sm-4 form-label">Start Session</span><div class="col-sm-8">
        <input type="text" class="form-control" placeholder="Session ID" name="Login">
      </div><div class="col-sm-12"><button class="btn btn-default" type="submit" name="start_session" style="width: initial !important;float: right;">Start</button>
      <div class="clearfix"></div></div>
      <div class="clearfix"></div>
    </div>
  </form>
</div> -->
<!-- <div class="session_started"> -->

<!-- </div> -->
<div   class="col-md-4 center"><?php foreach($errors as $error){ echo $error ; } 
if($errors == Null){
if(isset($_GET['done'])){echo "<div class='alert alert-success fade in'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>New File created successfully</div>";} } ?>
</div>
<div class="row">

<div class="col-md-4">
<h2 class="Lib1">Insurance & Risk</h2>
<?php 
if(isset($_SESSION["Login"])){
?>
<div>   
<a class="btn btn-default btn-sm document" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new document</a>
</div>
<?php
$date = date("Y-m-d");
$result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Public Laibility Insurance' and user_id = '$user_id'";
$sql1 = $conn->query($result);
?>
<a class="btn btn-default font-style-color-format" href="#collapseExample" data-toggle="collapse">Public Liability Insurance   (<?=$sql1->num_rows; ?>)</a>
<?php require_once('collapse/publiccollapse.php');?>
<?php
$date = date("Y-m-d");

$result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Indemnity Insurance' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document " href="#collapseExample101" data-toggle="collapse">Indemnity Insurance  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Indemnitycollapse.php');?>

<?php
$result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Worker Comp Insurance' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default " href="#collapseExample1" data-toggle="collapse">Worker Comp Insurance  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Workercollapse.php');?>
<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Risk Assesment' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#collapseExample102" data-toggle="collapse"> General Risk Assessment  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Riskcollapse.php');?>


<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='Fire Risk Assessments' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#collapseExample1002" data-toggle="collapse"> Fire Risk Assessment  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/fireRiskcollapse.php');?>

<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate >  '$date' and Documenttype='chemical Risk Assessments' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#collapseExample1012" data-toggle="collapse"> Chemical Risk Assessment  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/chemRiskcollapse.php');?>
<?php

$result = "SELECT * FROM coder WHERE Enddate  > '$date' and Documenttype='Safe Work Method Statement' and user_id = '$user_id'";

$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#collapseExample1003" data-toggle="collapse">Safe Work Method Statement (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Safecollapse.php'); ?>


<?php  
  }
?>
</div>
<!-- col-md-4 -->
<div class="col-md-4">
<h2 class="Lib1">Training</h2>
<?php 
if(isset($_SESSION["Login"])){
?>
<div>
<a class="btn btn-default btn-sm document" data-toggle="modal" data-target="#Training"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new document</a>
</div>
<?php require_once('select/Trainingselect.php');  ?>
<?php  
  }else {
    echo '<center>Login First!</center>';
  }
?>
</div>
<!-- col-md-4 -->
<div class="col-md-4">
<h2 class="Lib1">Equipment / Record</h2><?php 
if(isset($_SESSION["Login"])){
?>
<div>
<a class="btn btn-default btn-sm document" data-toggle="modal" data-target="#Equipment"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> new document</a>
</div>
<?php require_once('select/Equipmentselect.php'); ?>
<?php  
  }else {
    echo '<center>Login First!</center>';
  }
?>
</div>
<!-- col-md-4 -->
</div>
<div class="row">
<div class="col-md-4">

<h2 class="Lib1">Expired Documents</h2>
<?php 
if(isset($_SESSION["Login"])){
?>
<?php
$date = date("Y-m-d");
$result = "SELECT * FROM coder WHERE Enddate <  '$date' and Documenttype='Public Laibility Insurance' and user_id = '$user_id'";
$sql1 = $conn->query($result);
?>
<a class="btn btn-default font-style-color-format" href="#scollapseExample" data-toggle="collapse">Public Liability Insurance  (<?=$sql1->num_rows; ?>)</a>
<?php require_once('collapse/publiccollapse_exp.php');?>
<?php
$date = date("Y-m-d");

$result = "SELECT * FROM coder WHERE Enddate < '$date' and Documenttype='Indemnity Insurance' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document " href="#scollapseExample101" data-toggle="collapse">Indemnity Insurance (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Indemnitycollapse_exp.php');?>
<?php
$result = "SELECT * FROM coder WHERE Enddate <  '$date' and Documenttype='Worker Comp Insurance' and user_id = '$user_id'";
$sql = $conn->query($result);
?>

<a class="btn btn-default " href="#scollapseExample1" data-toggle="collapse">Worker Comp Insurance (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Workercollapse_exp.php');?>
<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate <  '$date' and Documenttype='Risk Assesment' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#scollapseExample102" data-toggle="collapse">General Risk Assessment (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Riskcollapse_exp.php');?>


<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate <  '$date' and Documenttype='Fire Risk Assessments' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#scollapseExample1132" data-toggle="collapse"> Fire Risk Assessment  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/fireRiskcollapse_exp.php');?>

<?php 
$date = date("Y-m-d");
 $result = "SELECT * FROM coder WHERE Enddate <  '$date' and Documenttype='chemical Risk Assessments' and user_id = '$user_id'";
$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#scollapseExample1142" data-toggle="collapse"> Chemical Risk Assessment  (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/chemRiskcollapse_exp.php');?>

<?php
$result = "SELECT * FROM coder WHERE Enddate  < '$date' and Documenttype='Safe Work Method Statement' and user_id = '$user_id'";

$sql = $conn->query($result);
?>
<a class="btn btn-default btn-sm document" href="#sscollapseExample1003" data-toggle="collapse">Safe Work Method Statement (<?=$sql->num_rows; ?>)</a>
<?php require_once('collapse/Safecollapse_exp.php');?>



<?php  
  }else {
    echo '<center>Login First!</center>';
  }
?>
</div>
<div class="col-md-4">
<h2 class="Lib1">Expired Documents</h2>
  <?php require_once('expired/traing_ex.php'); ?>
</div>

<div class="col-md-4">
<h2 class="Lib1">Expired Documents</h2>
<?php require_once('expired/equipment_ex.php'); ?>
 </div>
  </div>


  </div>
    </div>



</body>

<?php  @include("../footer1.php"); ?>
    <!-- Coustom Script -->
    <script type="text/javascript" src="js/script.js"></script>
</html>

