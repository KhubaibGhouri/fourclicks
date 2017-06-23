<?php 
session_start();
if( $_SESSION['type']!='admin' and !$_SESSION['Login']){
    header("location:index.php");
}

include '../contractor/db/connect.php';
@include("../header1.php");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
         $('#state')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
        $('#city')
        .children()
            .remove()
            .end()
            .append('<option value="">Please wait Loading...</option>');
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#service").change(function() {
        var selVal = $(this).val();
        $("#textboxDiv").html('');
        if(selVal == 'other') {
            
                $("#textboxDiv").append('<label class="control-label col-sm-4" for="pwd">Enter Service Type:</label><div class="col-sm-6"><input type="text" class="form-control" id="otherservice"  name="otherservicetype">');
            
        }
    });
});
</script>
<style>
.alert {
    padding: 20px;
    background-color: green;
    color: white;
}
</style>
<div class="container-fluid">
  <?php @include("admin-sidebar.php"); ?>

    <div class="col-sm-10">
<div class=" sign_con_adj text-center" >
       
	<div class="sign_main_con_adj">
	     <?php
  if($_GET['a']=='done'){
?>
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
 New Member has been created sucessfully !
</div>
<?php } ?>
	    
	<h2>Add New Member</h2>
		<form class="form-horizontal"  action="add-member.php" method="post" id="signup-form12">
		
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Membership Type:</label>
		    <div class="col-sm-6"> 
		      <select  name="type" class="form-control"  id="type" >
			 <option value=''>Select Type</option>
			  <option value='contractor'>Contractor</option>
			   <option value='client'>Client</option>
			
			</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="email">Business Name:</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control"  placeholder="" name="username" required="" id ="username">
		       
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Contact Person:</label>
		    <div class="col-sm-6"> 
		      <input class="form-control"  placeholder=""  name="contact_name" type="text" required="" id="contact_name">
		    
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Mobile Number:</label>
		    <div class="col-sm-6"> 
		      <input name="mobile" type="text" class="form-control"  placeholder="" required="" id="mobile">
		       
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Phone Number:</label>
		    <div class="col-sm-6"> 
		      <input name="PhoneNumber" type="text" class="form-control"  placeholder="" required="" id="PhoneNumber">
		       
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Country:</label>
		    <div class="col-sm-6"> 
		      <select  name="country" class="form-control"  id="country" >
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
		<div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">State:</label>
		    <div class="col-sm-6"> 
		       <select  name="state" class="form-control"  id="state" >
			
    <option value="">Select country first</option>
</select>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">City:</label>
		    <div class="col-sm-6"> 
		      <select name="city" id="city"  class="form-control">
    <option value="">Select state first</option>
</select> 
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Post Code:</label>
		    <div class="col-sm-6"> 
		      <input type="number" class="form-control" id="zip" placeholder="" name="zip" required="">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Contractor Service Types:</label>
		    <div class="col-sm-6"> 
		       <select name="service"  class="form-control" required="" id="service">
		       
		        <option value="">Select Service Types</option>
                                                                      
     <?php
		      	$result = "SELECT * FROM  `services_type` ORDER BY serv_name";
				$sql = $conn->query($result);
					
					
	                while($row = $sql->fetch_assoc()) { 
	                 
                                          echo  '<option value="'.$row['serv_name'].'">'.$row['serv_name'] .'</option>';
                                                                        }?>
                                                                 <option value="other">Other</option>
                                                                    </select>
		    </div>
		  </div>
		  
		  
		    <div class="form-group" id="textboxDiv">
		    
		  </div>
		  
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Email Address:</label>
		    <div class="col-sm-6"> 
		      <input type="email" class="form-control" id="email" placeholder="" name="email" type="email" required="">
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Confirm Email Address:</label>
		    <div class="col-sm-6"> 
		      <input class="form-control" id="cemail" placeholder="" name="cemail" type="email" required="">
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Password:</label>
		    <div class="col-sm-6"> 
		      <input type="password" name="password"  class="form-control" id="password" placeholder="" required="">
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Confirm Password:</label>
		    <div class="col-sm-6"> 
		      <input name="cpassword" class="form-control" type="password" placeholder="" required="" id="cpassword">
		    </div>
		  </div>
 <div class="form-group">
		    <label class="control-label col-sm-4" for="pwd">Enter Expiry Date</label>
		    <div class="col-sm-6"> 
		      <input name="expiry_date" class="form-control" type="text" placeholder="" required="" id="datepicker">
		    </div>
		  </div>
	


	<button type="submit" class="btn btn-success">Submit</button>	
	</div>
</div>

</form>

</div>
</div>
</div>
<?php 
@include("../footer1.php");
?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="../validation/lib/jquery.validate.js"></script>
<link rel="stylesheet" type="text/css" href="../validation/stylesheets/css/screen.css" />
<script>
$().ready(function() {

    $("#signup-form12").validate({ 
	rules:{


            coupon: {
            required:false,
               remote: "check-coupon.php"
                },
       
		    
				username:{
					required:true,
					
					},
					country:{
					required:true,
					
					},
					state:{
					required:true,
					
					},
					city:{
					required:true,
					
					},
					
				
				contact_name:{
					required:true,
					
					},

				email: {
				           required: true,
				           email: true
				       },
				   cemail: {
				           required: true,
				           email: true,
				            equalTo: "#email"
				       },
		        PhoneNumber: {
				          required: true,
				          number: true
				            },
				     mobile: {
				          required: true,
				          number: true
				            },
				              zip: {
				          required: true,
				          number: true
				            },
				          
			password: {
				            required: true,
				            minlength: 4
				            },
		     cpassword: {
				                required: true,
				                minlength: 4,
				                equalTo: "#password"
				            },
				          
				service:{
					required:true
					
					},
				
				term:{
					required:true
					
					},
				
				
		
		},//rules closed
		
		
		messages:{
			
			username:{
					required:"Please enter your Business Name.",
					letters:"Only Alphabets are allowed.",
					               },
			
			contact_name:{
				 required: "Please enter contact Person Name",
				 letters:"Only Alphabets are allowed.",
                 
                                    },		
			
			email:{
					required:"Please Enter your Email address.",
					email:"Please Enter valid Email.",
					                },
		cemail:{
			 required: "Please confirm Your Email",
              
                equalTo: "Email adress does not match"
					
					
                                    },	
			
			PhoneNumber:{
				    required: "Please enter your phone number",
                number: "Please enter only numeric value"
                                    },
                                    
                                    zip:{
				    required: "Please enter your zip code",
                number: "Please enter only numeric value"
                                    },
                                    mobile:{
				    required: "Please enter your  Cell number",
                number: "Please enter only numeric value"
                                    },
			
			password:{
					required: "Please provide a password",
                minlength: "Your password must be at least 4 characters long"
					               },
	
			cpassword:{
				 required: "Please confirm password",
                minlength: "Your password must be at least 4 characters long",
                equalTo: "Please enter the same password as above"
					               },
			
			term:{
					required:"Please select checkox if you are agree with our terms & condition",
					
					               },
					               Coountry:{
					required:"Please select country",
					
					               },state:{
					required:"Please select State",
					
					               },city:{
					required:"Please select city",
					
					               },
	 coupon:{
	 	
                remote: "This coupon is already taken or expired ! Try another."
            },
			
			
			
			},//messages closed		
		
		 })//$("#admission_form").validate({ closed

}); //$().ready(function(){ closed
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
       dateFormat: 'yy-mm-d',
      changeYear: true
    });
  } );
  </script>