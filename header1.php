<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
   <title>Four Click Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="../custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="../css/bootsnav.css">
        <!-- Fancybox -->
       
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="../css/custom.css" />
        
  <link rel="stylesheet" type="text/css" href="../css/table.css">

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <!-- Preloader -->

       

        <!--End off Preloader -->

        <!-- Header -->
        <header>
            <!-- Top Navbar -->
            <div class="top_nav">
                <div class="container">
                    <div class="logo">
                        <a class="navbar-brand" href=""><img src="../images/logo-construction.png" alt="logo"></a>
                    </div>
                    <ul class="list-inline social_icon">
                      <li><a href=""><span class="fa fa-facebook"></span></a></li>
                        <li><a href="https://twitter.com/4clicksolutions"><span class="fa fa-twitter"></span></a></li>
                        
                        <li><a href="https://au.linkedin.com/in/andrew-greenslade-7aa58191"><span class="fa fa-linkedin"></span></a></li>
                    </ul>			
                </div>
            </div><!-- Top Navbar end -->

            <!-- Navbar -->
            <nav class="navbar bootsnav">


                <div class="container">
                    <!-- Atribute Navigation
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>-->
                    <!-- Header Navigation -->
                    <div class="navbar-header" id="header2">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Navigation -->
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul class="nav navbar-nav menu">
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="../Facilitated-Services.php">Facilitated Services</a></li> 
                                <?php 
                                     if($_SESSION['type'] != 'admin'){
                               if($_SESSION['user_type']=='client'){?>
         <li><a href="https://fourclicksolutions.com/client/index.php">Client</a></li> 
  <?  }elseif($_SESSION['contrat']=='contractor'){ ?>
    <li><a href="https://fourclicksolutions.com/contractor/index.php">Contractor</a></li> 
   <? }   }               
                     ?>           
                                <ul class="nav navbar-nav ">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['business_name']; ?><b class="caret"></b></a> 
                                            <ul class="dropdown-menu ">
                                         <?   if($_SESSION['type'] != 'admin'){?>
                                              <li><a href="../user/user-profile.php?u=<?php echo $_SESSION['user_id']; ?>">Profile</a></li>   
                                              <?} ?>
                                         <li><a href="../logout.php">Logout</a></li>   
                                            </ul>
                                    </li>
                                </ul>
                                
                            </ul>
                        </div>
                    </div>

                </div>   
                <!-- Top Search
             <div class="top-search">
                 <div class="container">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-search"></i></span>
                         <input type="text" class="form-control" placeholder="Search">
                         <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                     </div>
                 </div>
             </div>-->
            </nav><!-- Navbar end -->
        </header><!-- Header end -->