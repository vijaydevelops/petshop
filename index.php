<?php $gotoMain = './'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pets shop management system</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="css/Barlow.css" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="<?php echo $gotoMain; ?>">
                                <h1><center><B><font size ="3"><font color="red"><font name="sans-serif">PET SHOP MANAGEMENT SYSTEM</font></font></font></B></</h1></center>
                                
                            </a>
                        </div>
                    </div>
                   
					<div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                   
                                    <div class="top-bar-text">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-text">
                                      
                                    
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                   
                                    <div class="top-bar-text">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <?php include($gotoMain.'navbar.php'); ?>

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel common-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/33.jpg" alt="Image">					
                        </div>
                        <div class="carousel-text">
                            <h3>PETS</h3>
                            <h1>LOVE UR PETS</h1>
                            <p>
                                All you need is love and treats…lots of treats.
                            </p>
                            
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/44.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>ANIMALS AND BIRDS</h1>
                           
                            <p>
                                Delivering pet happiness.
                            </p>
                            
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/22.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>PETS</h3>
                            <h1>LIFE</h1>
                            <p>
                                Pets are not our whole life, but they make our lives whole.
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

       
        
      
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
