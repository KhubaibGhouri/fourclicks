<?php
    @include("header.php");
@include("contractor/db/connect.php");
?>

 <?php

	 $result1 = "SELECT * FROM  `misc`";
	$sql1 = $conn->query($result1);
				if ($sql1->num_rows > 0) {
					
	                while($rows = $sql1->fetch_assoc()){
			
	            $contractor_fee= $rows['contractor_fee'];
	               $client_fee= $rows['client_fee'];
	                
	            
}};
?>

        <!-- Contact form -->
        <section id="pakages">

            <br>      

            <!-- PRICING TABLE STYLE 5-->
            <div class="container">
                <div class="row">
                    <div class="container-2">
                      

         

                        <div class="col-md-6 col-sm-12 col-xs-12 float-shadow">  
                                 
                            <div class="price_table_container">                    
                                <div class="price_table_heading">Client Annual Subscription</div>
                                <div class="price_table_body">
                                    <div class="price_table_row cost success-bg" style="background: #ffcb0f"><strong>$ <?=  $client_fee ;?> </strong><span> plus GST</span></div>
                                    <div class="price_table_row">Cloud Based Contractor Document Storage.</div>
                                    <div class="price_table_row">Access to all Pre-Approved Contractors.</div>
                                    <div class="price_table_row"></div>
                                    <div class="price_table_row"></div>
                                    <div class="price_table_row"></div>
                                    <div class="price_table_row"></div> 
                                    <div class="price_table_row"></div> 
                                    <div class="price_table_row"></div> 
                                    <div class="price_table_row"></div> 
                                    
                                </div>
                                 <form action="signup.php" method="Post">
                                <input type="hidden" name="memb_type" value="client">
                                <button type="submit" class="btn btn-default btn-lg btn-block" style="background: #ffcb0f">Sign Up</button>
                               
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 float-shadow">        
                            <div class="price_table_container">
                                 <div class="price_table_heading">Contractor Annual Subscription</div>
                                <div class="price_table_body">
                                    <div class="price_table_row cost success-bg" style="background: #ffcb0f"><strong>$ <?= $contractor_fee ;?></strong><span> plus GST</span></div>
                                    <div class="price_table_row">Insurance Document storage and delivery to your Client.</div>
                                    <div class="price_table_row">Risk Assessment storage and delivery to your Client.</div>
                                    <div class="price_table_row">Safe Work Method Statement storage and delivery to your Client.</div>
                                    <div class="price_table_row">Competency & Training Certificate storage and delivery to your Client.</div>
                                    <div class="price_table_row">Asset & Equipment Document Storage and delivery to your Client.</div>
                                    <div class="price_table_row">Virtual Assistant reminder support service for all uploaded documents.</div>  
                                    <div class="price_table_row">Ability to grow your Client Base by being visible to new Clients.</div>
                                    <div class="price_table_row">10% DISCOUNT on Four Solution Services.</div>
                                    <div class="price_table_row"></div>
                                </div>
                                <form action="signup.php" method="Post">
                                <input type="hidden" name="memb_type" value="contractor">
                                <button type="submit" class="btn btn-default  btn-lg btn-block" style="background: #ffcb0f">Sign Up</button>
                               
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRICING TABLE STYLE 5-->
            <br>   

        </section><!-- Contact form end -->






        <!-- Footer -->
        <?php
            @include("footer.php");
            ?>