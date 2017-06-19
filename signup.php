<?php

include 'contractor/db/connect.php';
@include("header.php");

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
<?php if( !isset($_POST['memb_type'] ) ) { $URL="packages.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>"; } ?>
<div class="container sign_con_adj text-center">
	<div class="sign_main_con_adj">
	<h2><?php if(isset( $_POST['memb_type'])){ echo  $_POST['memb_type'];}?> Membership</h2>
		<form class="form-horizontal"  action="register-config.php" method="post" id="signup-form12">
		 <input name="type" type="hidden" class="form-control" id="type" value="<?php if( isset($_POST['memb_type'] ) ) { echo $_POST['memb_type']; } ?>" >
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
		    <label class="control-label col-sm-4" for="pwd">Enter Coupon Code (if any):</label>
		    <div class="col-sm-6"> 
		      <input name="coupon" class="form-control" type="text" placeholder="" required="" id="coupon">
		    </div>
		  </div>
	<div class="pull-left">
		<table id="pmpro_tos_fields" class="pmpro_checkout top1em sign_cond_adj" width="100%" cellpadding="0" cellspacing="0" border="0">
		<thead>
		<tr class="odd td_adj">
		<th>Terms &amp; Conditions</th>
		</tr>
	</thead>
		<tbody class="pull-left">
			<tr class="odd td_adj ">
				<td class="pull-left">
					<div id="pmpro_license">
					<div class="flex_column av_one_full  flex_column_div av-zero-column-padding first  " style="border-radius:0px; ">
					<section class="av_textblock_section" itemscope="itemscope" itemtype="#">
					<div class="avia_textblock " itemprop="text">
					<p><strong>Client / Contractor Agreement</strong></p>
					<p>Please read this agreement carefully before registering as a “Client / Contractor”, accessing or using the information and services available through the “module 1” web interface (“Site”). By registering as a “Client / Contractor”, accessing or using the Site, you agree to be bound by the terms and conditions detailed below.</p>
					<p>Four Solutions may modify this agreement at any time, and such modifications shall be effective immediately upon posting on the Site.</p>
					<ol>
					<li><a name="_Toc461263637"></a> Definitions:</li>
					</ol>
					<ul>
					<li>“Module 1” means the on-line Client / Contractor Safety Management System (web based database interface) available to the Client / Contractor on an annual subscription arrangement with Four Solutions.</li>
					<li>“Related Materials” means the use of documentation and any other related material provided in whatever form to the Client / Contractor by or on behalf of Four Solutions.</li>
					<li>“Client / Contractor” means a Client / Contractor who has registered in&nbsp;Four Solutions and paid the annual Client / Contractor subscription fee.</li>
					</ul>
					<ol start="2">
					<li>&nbsp;Ownership, Copyright and Trademarks</li>
					</ol>
					<p>Four Solutions (including any header) and Related Materials, and all associated copyrights or other intellectual property rights, are the property of Four Solutions.</p>
					<p>Client / Contractor acquires no title, right or interest in Four Solutions and agrees not to infringe any intellectual property rights owned by Four Solutions.</p>
					<ol start="3">
					<li>&nbsp;Information for Client / Contractor Use Only</li>
					</ol>
					<p>The information contained on this Site and accessible to the Module 1 is for the exclusive use of the Client / Contractor only.</p>
					<p>Material downloaded from this Site is for the exclusive use of the Client / Contractor only. Where material is downloaded, the Client / Contractor agrees to keep intact all copyright and other proprietary notices including those of a confidential nature.</p>
					<ol start="4">
					<li><a name="_Toc461263640"></a> Information – Not Professional Advice</li>
					</ol>
					<p>The Client / Contractor agrees that information contained in the Site is of a general nature.</p>
					<p>Four Solutions will endeavor to ensure information uploaded onto the Site is current, valid and authentic, but will not take responsibility for incorrect or misleading information uploaded by the Contractors.</p>
					<p>Four Solutions will not be liable to the Client / Contractor or anyone else for any decision made or actions taken in reliance upon information contained on or omitted from the Site.</p>
					<ol start="5">
					<li><a name="_Toc461263641"></a> Links to Other Internet Sites</li>
					</ol>
					<p>Four Solutions, may from time to time provide links to other relevant internet sites maintained by third parties from its Site, as an added service and convenience for the Client / Contractor.</p>
					<p>Such linked sites are not under the control of Four Solutions. Four Solutions does not therefore:</p>
					<ul>
					<li>Take responsibility for the contents (including the accuracy, legality or decency) of any linked site or any links contained in a linked site.</li>
					<li>Endorse any of the linked sites.</li>
					<li>Take responsibility for the copyright compliance of any linked site.</li>
					<li>Take responsibility for any damages or loss arising from access to or the use of the linked site.</li>
					</ul>
					<ol start="6">
					<li><a name="_Toc461263642"></a> Support Services</li>
					</ol>
					<p>Support services for Four Solutions, shall be available from Four Solutions and may be requested by the Client / Contractor by means of Electronic Mail (E-Mail) or Telephone.</p>
					<p>Four Solutions provides no guarantee that the services generally available through its Site will be uninterrupted or error-free. Any identified defects in the service will be corrected by Four Solutions as soon as practically possible, but no later than 48 hours.</p>
					<p>Four Solutionscannot and does not guarantee that files available for downloading from the Site will be free of infections or viruses, worms, trojan horses or other codes that manifest contaminating or destructive properties. The Client / Contractor is responsible for implementing sufficient processes and protections (fire walls, virus protection etc.) to ensure virus free downloads.</p>
					<ol start="7">
					<li><a name="_Toc461263643"></a> Ownership of Data and Information</li>
					</ol>
					<p>Four Solutions, and any data incorporated in Module 1 is owned by Four Solutions and is leased to the Client / Contractor and remains the property of Four Solution.</p>
					<p>The Client / Contractor will provide and transmit to Module 1 data, information and content to be uploaded to the Site and accessed by the Client / Contractor, Four Solutions will provide the Client / Contractor.</p>
					<ol start="8">
					<li><a name="_Toc461263644"></a> Right to Suspend or Cancel subscriptions</li>
					</ol>
					<p>Four Solutions reserves the right to suspend or cancel service to the Client / Contractor at any time and with one (1) months’ notice, for any reason, including, but not limited to, refusal or failure to pay for services provided.</p>
					<ol start="9">
					<li><a name="_Toc461263645"></a> Responsibility for Login Details (User Identification &amp; Password)</li>
					</ol>
					<p>The Client / Contractor is solely responsible for their login details (user identification &amp; password). Login details are made available to no more than&nbsp;3 responsible persons in the Client / Contractor’s organization.</p>
					<p>The Client / Contractor agrees to notify Four Solutions immediately it becomes aware of any such loss or theft or unauthorized use of the Client / Contractor’s User ID and Password. After such notification Four Solutions shall as soon as reasonably possible, disable access and services for the “corrupted” User ID and Password and shall issue a replacement User ID and Password accordingly.</p>
					<ol start="10">
					<li><a name="_Toc461263646"></a> Indemnity</li>
					</ol>
					<p>The Client / Contractor agrees to indemnify and hold harmless Four Solutions and it’s Personnel and keep them indemnified, against all loss, action, proceedings, costs, expenses (including legal fees), claims and damages arising from:</p>
					<p>a) Any breach by the Client / Contractor of the General Conditions; or</p>
					<p>b) Reliance by the Client / Contractor on any information obtained through the Site</p>
					<ol start="11">
					<li><a name="_Toc461263647"></a> Payments and Invoicing</li>
					</ol>
					<p>Four Solutions extends one-month credit to the Client / Contractor. All services must be paid for within the credit period or sooner in Australian currency. All quoted prices are exclusive of GST.</p>
					<p>It is the responsibility of the Client / Contractor to ensure that full fees are paid to Four Solutions in a timely manner, recognizing that failure to do so could cause service interruption.</p>
					<ol start="12">
					<li><a name="_Toc461263648"></a> Warranties and Representation</li>
					</ol>
					<p>Four Solutions is not responsible for data, information or content maintained and downloaded by the Client / Contractor via Module 1.</p>
					<p>Four Solutions does not make, and hereby disclaims, any and all other express and/or implied warranties, including, but not limited to, warranties of merchantability, fitness for a particular purpose, non-infringement and title, and any warranties arising from a course of dealing, usage, or trade practice.</p>
					<p>Four Solutions, does not warrant that the services will be uninterrupted, error-free, or completely secure.</p>
					<ol start="13">
					<li><a name="_Toc461263649"></a> Limited Liability</li>
					</ol>
					<p>Four Solutions, cumulative liability to Client / Contractor or any other party for any loss or damages resulting from any claims, demands, or actions arising out of or relating to this agreement shall not exceed, in any case, the annual licensing fee paid by the Client / Contractor for Module 1.</p>
					<p>In no event shall Four Solutions or its suppliers be liable for any indirect, incidental, consequential, special, or exemplary damages (including but not limited to, damages for loss of business, profits, business interruption, loss of business information, data, goodwill or other pecuniary loss) arising out of the use or inability to use Module 1 even if Four Solutions has been advised of the possibility of such damages.</p>
					<p>In no event shall Four Solutions be responsible or held liable for any damages resulting from physical damage to tangible property or death or injury of any person whether arising from Four Solutions, negligence or otherwise.</p>
					<ol start="14">
					<li><a name="_Toc461263650"></a> Assignment</li>
					</ol>
					<p>This Agreement and any rights granted through licensing of Module 1 may not be assigned, Client / Contractor or otherwise transferred by Client / Contractor to any third party without the prior written consent of Four Solutions.</p>
					<ol start="15">
					<li><a name="_Toc461263651"></a> Law and Jurisdiction</li>
					</ol>
					<p>This Agreement shall be governed by and construed in accordance with the laws of the state of Queensland and the exclusive jurisdiction of the courts of Australia.</p>
					<ol start="16">
					<li><a name="_Toc461263652"></a> Refunds &amp; Remedies</li>
					</ol>
					<p>Four Solutions are not required to provide refund if you change your mind about the services you asked for.</p>
					<p>A Client / Contractor can choose to cancel their contract and receive a refund if the service has a major problem.</p>
					<p>This is when the service –</p>
					<ul>
					<li>Has a problem that would have stopped the Client / Contractor purchasing the service if they had known about it</li>
					<li>Is substantially unfit for its purpose and cannot be easily fixed within a reasonable time.</li>
					<li>Does not meet the specific purpose and cannot be easily rectified within a reasonable time.</li>
					</ul>
					</div>
					</section>
					</div>
					</div>
					<div class="pull-left">
					<input type="checkbox" name="tos" value="1" id="term" required> <label class="pmpro_normal pmpro_clickable" for="tos" required>I agree to the Terms &amp; Conditions</label>
					</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div>

	<input type="image" class="pmpro_btn-submit-checkout" value="Check Out with PayPal »" src="assets/btn_xpressCheckout.gif" name= "submit">
		
	</div>
</div>

</form>

</div>
<?php 
@include("footer.php");
?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="validation/lib/jquery.validate.js"></script>
<link rel="stylesheet" type="text/css" href="validation/stylesheets/css/screen.css" />
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