<!DOCTYPE html>
<?php  @include('header.php'); ?> 
<!-- saved from url=(0078)https://fourclicksolutions.com/membership-account/membership-checkout/?level=3 -->
<html lang="en-US><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      
        <title>IT</title>
      
        <link rel="stylesheet" id="pmpro_frontend-css" href="assets/frontend.css" type="text/css" media="screen">
        
        <link rel="stylesheet" id="dms-css" href="assets/dms.css" type="text/css" media="all">
        <link rel="stylesheet" id="jquery-ui-css-css" href="assets/jquery-ui.min.css" type="text/css" media="all">
        <link rel="stylesheet" id="font-awesome-smarty-css" href="assets/font-awesome.min.css" type="text/css" media="all">
        
        <link rel="stylesheet" id="avia-grid-css" href="assets/grid.css" type="text/css" media="all">
        <link rel="stylesheet" id="avia-base-css" href="assets/base.css" type="text/css" media="all">

        
       
        <link rel="stylesheet" id="avia-custom-css" href="assets/custom.css" type="text/css" media="all">
        
    </head>
    <body id="top" class="pmpro-checkout page-template-default page page-id-647 page-child parent-pageid-644 stretched metrophobic helvetica-neue-websave _helvetica_neue  pmpro-body-has-access" itemscope="itemscope" itemtype="https://schema.org/WebPage">
   <br><br>
        <div id="wrap_all">



            <div id="main" class="all_colors" data-scroll-offset="0">

                

                    <div class="container">

                        <main class="template-page content  av-content-full alpha units" role="main" itemprop="mainContentOfPage">

                            <article class="post-entry post-entry-type-page post-entry-647" itemscope="itemscope" itemtype="">

                                <div class="entry-content-wrapper clearfix">
                                    <header class="entry-content-header"></header><div class="entry-content" itemprop="text"><div id="pmpro_level-3">
                                            <form id="pmpro_form" class="pmpro_form" action="register-config.php" method="post">

                                                <table id="pmpro_pricing_fields" class="pmpro_checkout" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <span class="pmpro_thead-name">Membership Level</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p>
                                                                    You have selected the <strong>Contractor</strong> membership level.				</p>

                                                                <p>Module 1 – Annual Subscription</p>

                                                                <div id="pmpro_level_cost">
                                                                    <p>The price for membership is <strong>$495.00</strong> now. Customers in AUS will be charged 10% tax.</p>
                                                                    <p>Membership expires after 1 Year.</p>
                                                                </div>



                                                            </td>
                                                        </tr>
                                                   
                                                    </tbody>
                                                </table>



                                                <table id="pmpro_user_fields" class="pmpro_checkout" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <?php 
                                                if (isset ($data)){
                                                print_r($data);
                                                @$msg = $_REQUEST['msg'];
                                                if($msg=='ok'){ ?>

                                                <?php } }?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    <label for="username">Business Name</label>
                                                                    <input id="username" name="username" type="text" class="input pmpro_error pmpro_required" size="30" value=""><span class="pmpro_asterisk"> <abbr title="Required Field" required>*</abbr></span>
                                                                </div>
                                                                <div>
                                                                    <label for="username">Contact Name</label>
                                                                    <input id="username" name="contact" type="text" class="input pmpro_error pmpro_required" size="30" value=""><span class="pmpro_asterisk"> <abbr title="Required Field" reqquired>*</abbr></span>
                                                                </div>
                                                                <div>
                                                                    <label for="PhoneNumber">PhoneNumber</label>
                                                                    <input id="PhoneNumber" name="PhoneNumber" type="text" class="input pmpro_error pmpro_required" size="30" value="" required>
                                                                </div>
                                                                <div>
                                                                    <label for="username">Contractor Service Types</label>
                                                                    <select name="service" id="" required="">
                                                                        <option value="">Select Service Types</option>
                                                                        <option value="Agricultural Equipment Technician">Agricultural Equipment Technician
                                                                        </option>
                                                                        <option value="Air Conditioning Services">Air Conditioning Services</option>
                                                                        <option value="Air Conditioning Services">Air Conditioning Services</option>
                                                                        <option value="Architectural Sheet Metal">Architectural Sheet Metal</option>
                                                                        <option value="Asphalt Paving Technician">Asphalt Paving Technician
                                                                        </option>
                                                                        <option value="Automatic Transmission Service Technician">Automatic Transmission Service Technician
                                                                        </option>
                                                                        <option value="Automotive Collision Repair Technician">Automotive Collision Repair Technician
                                                                        </option>
                                                                        <option value="Automotive Services
                                                                                ">Automotive Services
                                                                        </option>
                                                                        <option value="Boilermaking Services
                                                                                ">Boilermaking Services
                                                                        </option>
                                                                        <option value="Calibration Services">Calibration Services
                                                                        </option>
                                                                        <option value="Carpentry Services">Carpentry Services
                                                                        </option>
                                                                        <option value="Catering Services">Catering Services
                                                                        </option>
                                                                        <option value="Cement Mason">Cement Mason
                                                                        </option>
                                                                        <option value="Circular Sawfiler">Circular Sawfiler
                                                                        </option>
                                                                        <option value="Cleaning Services">Cleaning Services
                                                                        </option>
                                                                        <option value="Collision Repair Technician">Collision Repair Technician
                                                                        </option>
                                                                        <option value="Commercial Trailer Mechanic">Commercial Trailer Mechanic
                                                                        </option>
                                                                        <option value="Commercial Transport Vehicle Mechanic">Commercial Transport Vehicle Mechanic
                                                                        </option>
                                                                        <option value="Communication Services">Communication Services
                                                                        </option>
                                                                        <option value="Community Antenna Television Technician
                                                                                ">Community Antenna Television Technician</option>
                                                                        <option value="Construction Formwork Technician">Construction Formwork Technician
                                                                        </option>
                                                                        <option value="Construction Management Services">Construction Management Services
                                                                        </option>
                                                                        <option value="Consultancy Services">Consultancy Services
                                                                        </option>
                                                                        <option value="Cook/Chef Services">Cook/Chef Services</option>
                                                                        <option value="Cosmetologist">Cosmetologist
                                                                        </option>
                                                                        <option value="Crane Operating Services">Crane Operating Services
                                                                        </option>
                                                                        <option value="Dairy Production Technician">Dairy Production Technician
                                                                        </option>
                                                                        <option value="Diesel Engine Mechanic">Diesel Engine Mechanic</option>
                                                                        <option value="Electrical Services">Electrical Services</option>
                                                                        <option value="Electro-Plating Services">Electro-Plating Services</option>
                                                                        <option value="Elevator Services">Elevator Services
                                                                        </option>
                                                                        <option value="Engineering Services">Engineering Services
                                                                        </option>
                                                                        <option value="Environmental Services">Environmental Services
                                                                        </option>
                                                                        <option value="Fabrication/Welding Services">Fabrication/Welding Services
                                                                        </option>
                                                                        <option value="Fire Detection / Protection Services"></option>
                                                                        <option value="Formwork Technician">Formwork Technician
                                                                        </option>
                                                                        <option value="Funeral Director Services">Funeral Director Services
                                                                        </option>
                                                                        <option value="Furniture Design">Furniture Design
                                                                        </option>
                                                                        <option value="Gasfitting Services">Gasfitting Services
                                                                        </option>
                                                                        <option value="General Building Services">General Building Services
                                                                        </option>
                                                                        <option value="Geothermal Heating Technician">Geothermal Heating Technician
                                                                        </option>
                                                                        <option value="Glazing Services">Glazing Services</option>
                                                                        <option value="Hardwood Floorlayer">Hardwood Floorlayer</option>
                                                                        <option value="Health and Safety Supplies">Health and Safety Supplies
                                                                        </option>
                                                                        <option value="Heat and Frost Insulators">Heat and Frost Insulators</option>
                                                                        <option value="Heating Technician">Heating Technician</option>
                                                                        <option value="Heavy Duty Mechanic">Heavy Duty Mechanic</option>
                                                                        <option value="Heavy Equipment Operator">Heavy Equipment Operator
                                                                        </option>
                                                                        <option value="Hydraulic Crane Operator">Hydraulic Crane Operator
                                                                        </option>
                                                                        <option value="Hydraulic Service Mechanic">Hydraulic Service Mechanic
                                                                        </option>
                                                                        <option value="Hygiene Services">Hygiene Services</option>
                                                                        <option value="Inboard - Outboard Marine Equipment Technician">Inboard - Outboard Marine Equipment Technician
                                                                        </option>
                                                                        <option value="Industrial Instrument Mechanics">Industrial Instrument Mechanics
                                                                        </option>
                                                                        <option value="Industrial Warehouse Person">Industrial Warehouse Person
                                                                        </option>
                                                                        <option value="Sprinkler System Installer">Sprinkler System Installer
                                                                        </option>
                                                                        <option value="Surveying Services">Surveying Services</option>
                                                                        <option value="Tilesetter">Tilesetter</option>
                                                                        <option value="Tool and Die Maker">Tool and Die Maker
                                                                        </option>
                                                                        <option value="Transport Refrigeration Mechanic">Transport Refrigeration Mechanic
                                                                        </option>
                                                                        <option value="Upholstering Services">Upholstering Services
                                                                        </option>
                                                                        <option value="Utility Arborist">Utility Arborist
                                                                        </option>
                                                                        <option value="Waste Services">Waste Services
                                                                        </option>
                                                                        <option value="Water Well Driller">Water Well Driller
                                                                        </option>
                                                                        <option value="Welding Services">Welding Services
                                                                        </option>
                                                                        <option value="Window Cleaning Services">Window Cleaning Services
                                                                        </option>
                                                                    </select>
                                                                </div>


                                                                <div>
                                                                    <label for="password">Password</label> 
                                                                    <input id="password" name="password" type="password" class="input pmpro_error pmpro_required" size="30" value="" required=""><span class="pmpro_asterisk"> <abbr title="Required Field">*</abbr></span>
                                                                </div>
                                                                <div>
                                                                    <label for="password2">Confirm Password</label>
                                             <input id="password2" name="password2" type="password" class="input pmpro_error pmpro_required" size="30" value=""><span class="pmpro_asterisk"> <abbr title="Required Field" required>*</abbr></span>
                                                                </div>


                                                                <div>
                                                                    <label for="bemail">E-mail Address</label>
                                                                    <input id="bemail" name="bemail" type="email" class="input pmpro_error pmpro_required" size="30" value=""><span class="pmpro_asterisk"> <abbr title="Required Field" reqquired>*</abbr></span>
                                                                </div>
                                                                <div>
                                                                    <label for="bconfirmemail">Confirm E-mail Address</label>
                                                                    <input id="bconfirmemail" name="bconfirmemail" type="email" class="input pmpro_error pmpro_required" size="30" value=""><span class="pmpro_asterisk" reqquired> <abbr title="Required Field">*</abbr></span>

                                                                </div>
                                                                <div>
                                                                    <label for="username">Type</label>
                                                                    <select name="type" id="" required="">
                                                                        <option value="client">Client</option>
                                                                        <option value="contractor">contractor</option>
                                                                        </select>
                                                                </div>

                                                                <div class="pmpro_hidden">
                                                                    <label for="fullname">Full Name</label>
                                                                    <input id="fullname" name="fullname" type="text" class="input " size="30" value="" required=""> <strong>LEAVE THIS BLANK</strong>
                                                                </div>

                                                               
				
			</td>
		</tr>
	</tbody>
	</table>
	<table id="pmpro_tos_fields" class="pmpro_checkout top1em" width="100%" cellpadding="0" cellspacing="0" border="0">
		<thead>
		<tr>
		<th>Terms &amp; Conditions</th>
		</tr>
	</thead>
		<tbody>
			<tr class="odd">
				<td>
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
					<input type="checkbox" name="tos" value="1" id="tos"> <label class="pmpro_normal pmpro_clickable" for="tos">I agree to the Terms &amp; Conditions</label>
				</td>
			</tr>
		</tbody>
		</table>
		
	
	
	<div class="pmpro_submit">
		
				<span id="pmpro_paypalexpress_checkout">
				<input type="hidden" name="submit-checkout" value="1">
                                <input type="hidden" name="javascriptok" value="1">
				<input type="image" class="pmpro_btn-submit-checkout" value="Check Out with PayPal »" src="assets/btn_xpressCheckout.gif">
			</span>
			
			<span id="pmpro_submit_span" style="display: none;">
				<input type="hidden" name="submit-checkout" value="1"><input type="hidden" name="javascriptok" value="1">
				<input type="submit" class="pmpro_btn pmpro_btn-submit-checkout" value="Submit and Check Out »">
			</span>
			
		
		<span id="pmpro_processing_message" style="visibility: hidden;">
			Processing...		</span>
	</div>

</form>

		
</div> <!-- end pmpro_level-ID -->


</div>
                                  

		</article><!--end post-entry-->


	<!--end content-->
				</main>
							</div><!--end container-->
		</div><!-- close default .container_wrap element -->
						

		</div>
        </div>
      
    </body>

 <?php
    @include('footer.php');
?>  

    </html>