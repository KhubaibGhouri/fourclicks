<?php 
@include("../header1.php");
@include("../contractor/db/connect.php");
?>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <ul class="nav nav-pills nav-stacked ">
      	<p class="para_adj">Admin Side</p>
      	<hr>
        <li class=""><a href="#section1">Admin</a></li>
        <li><a href="#section2">Client</a></li>
        <li><a href="#section3">Constractor</a></li>
      </ul><br>
     
    </div>

    <div class="col-sm-10">
    	<p class="para_adj">abcdefghijklmnopqrstuvwxyz</p>
     	<table class="table tabl_pad">
		      <tbody>
		      <tr>
		        <th>Firstname</th>
		        <th>Lastname</th>
		        <th>Email</th>
		        <th>Email</th>
		        <th>Email</th>
		        <th>Email</th>
		        <th>Email</th>
		      </tr>
		      <tr>
		        <td>John</td>
		        <td>Doe</td>
		        <td>john@example.com</td>
		        <td>john@example.com</td>
		        <td>john@example.com</td>
		        <td>john@example.com</td>
		        <td><a href="#" ><span class="glyphicon" data-toggle="modal" data-target="#myModal">&#xe065;</span></a><a class="echo_link" href="http://new.muhammadimran.info/pricingpxontractor/delete/delete.php?del=871" onclick="return confirm(&quot;Are you dure to delete&quot;)"><span class="glyphicon">&#xe088;</span></a></td>
		      </tr>
		    
		    </tbody>
		  </table>

      
      
     
    </div>
  </div>
</div>







<?php 
@include("../footer.php");
?>