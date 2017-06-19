<?php
@include("header.php");
?>


        <section id="home" class="home">
            <!-- Carousel -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel-inner -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/1.PNG" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <h3>Four Solutions is an Australian owned and operated company specializing in </h3>
                                <h1>QHSE Business Solutions</h1>
                               
                                <p>We are not just building systems and documents, we are building relationships.</p>
                                <a  class="btn know_btn" href="contact.php">Contact Us</a>
                              
                            </div>					
                        </div>
                    </div>
                    
                <div class="item">
                        <img src="img/2.jpg" alt="Construction">
                        <div class="overlay">
                            <div class="carousel-caption">
                                <h3>Four Solutions is an Australian owned and operated company specializing in  </h3>
                                <h1>QHSE Business Solutions</h1>
                               
                                <p>We are not just building systems and documents, we are building relationships.</p>
                                <a  class="btn know_btn" href="contact.php">Contact Us</a>
                              
                            </div>      
                        </div>
                    </div>

                    
                </div><!-- Carousel-inner end -->



                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- Carousel end-->

        </section>


        <!-- About -->
        <section id="get-quit">
            <div class="container">
                <div class="row handle-about">
                    <div class="col-lg-10 col-md-8">
                        <div class="about_content">
                            <p>
                              We are specialized in Quality, Health, Safety and Environmental business solutions since 2016. </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 center">
                        <a class="btn know_btn" href="contact.php">Contact Us</a>
                    </div>
                </div>
            </div>
        </section><!-- About end -->



        <!-- Services -->
        <section id="services">
            <div class="container">
                <h2>OUR SERVICES</h2>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <a href="service1.php">
                            <div class="service_item">
                                <img src="images/service_img3.jpg" alt="Our Services" />
                                <h3>Module 1 – Contractor Management</h3>
                                <div class="pro-line"><hr></div>
                                <div style="text-align: left;">
                                <p>Allow Four Solutions to Manage your Contractor Compliance Documentations via the Module 1 Cloud Storage system.<br>

                                Save time, effort and focus on running your business.<br>

                                Click on the Icon above for further details or alternatively contact us to discuss how we can support you.</p>
</div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="service2.php">
                            <div class="service_item">
                                <img src="images/service_img1.jpg" alt="Our Services" />
                                <h3>Module 2 – QHSE Services</h3>
                                <div class="pro-line"><hr></div>
                                <div style="text-align: left;">
                                <p>Allow Four Solutions to support all your Quality, Health, Safety & Environmental requirements.<br>

                                No Project too big or too small, Click on the Icon above for further details or alternatively contact us to discuss how we can support you.

                                </p>
</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="service3.php">
                            <div class="service_item">
                                <img src="images/service_img2.jpg" alt="Our Services" />
                                <h3>Module 3 – Procurement Services</h3>
                                <div class="pro-line"><hr></div>
                                <div style="text-align: left;">
                                <p>Allow Four Solutions use their knowledge and experience to support your procurement processes, whether contract negotiations or Supplier surveys or assessments.<br>

                                    Click on the Icon above for further details or alternatively contact us to discuss how we can support you.

                                    </p>
</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services end -->




       

        <!-- Testimonial -->



       <?php
      @include("footer.php"); 
       ?>