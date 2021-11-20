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
		
		<style>
			.carousel-item {
				padding : 0px 20px;
			}
			.carousel-box {
				background-color: rgba(0,0,0,0.2);
				width: 100%;
				height: 150px;
				border-radius: 20px;
			}
			.carousel-text {
				background-color: transparent;
				margin-top: 50px;
			}
			
			.anicat-carousel .owl-item:nth-child(odd) h3 {
				color: red;
			}
			.anicat-carousel .owl-item:nth-child(even) h3 {
				color: #000;
			}
		</style>
		
		 <style>
            body {
			  margin: 0;
			  font-family: Arial, Helvetica, sans-serif;
			  background: rgba(0,0,0,0.2);
			}
			.topnav {
			  overflow: hidden;
			  background-color:#8d2663;
			  height: 70px;
			  border: 3px solid #b40a70;
			}

			.topnav a {
			  float: left;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 35px;
			  font-weight: bold;
			}

			.topnav-right {
			  float: right;
			}
			table {
				font-family: arial, sans-serif;
				border-collapse: collapse;
				outline:#b40a70 solid 5px;
				width: 100%;
				margin:5px ;
				background: #FAFAFA;
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}
			th{
			  background-color:#8d2663;
			}



			.custombutton{
			  margin:25px;
			  
			}
			input[type=text] {
				width: 15%;
				padding: 12px 20px;
				margin:8px ;
				border: 2px solid red;
				background:transparent;
				color:#000000;        
			}
		</style>  

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
    </head>

    <body>
		
		

		<?php include($gotoMain.'navbar.php'); ?>
		
		<div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="logo">
                            <a href="<?php echo $gotoMain; ?>">
                                <h1><center><B><font size ="3"><font color="red"><font name="sans-serif">PET SHOP MANAGEMENT SYSTEM</font></font></font></B></</h1></center>
                                
                            </a>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-6">
                        <div class="logo">
                            <a href="<?php echo $gotoMain; ?>animal_cat.php">
                                <h1><center><B><font size ="3"><font color="red"><font name="sans-serif">ANIMALS</font></font></font></B></</h1></center>
                                
                            </a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		
		<div id="formarea" ></div>
		
		<!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        
		<script>
			function triggerInnerAnchorClick(e){
				console.log(e.target)
				let anchor = $(e.target).find('a').get()[0]
				
				// window.location.href = $(anchor).attr('href')
				loadInnerPanel($(anchor).attr('href'))
			}
			
			
				
				
			function loadInnerPanel(panelName){
				console.log(panelName)
				let loadPage = 'animal_cat_panel.php';
				let panelNames;
				if(panelName){
					panelNames = panelName.split('/')
					pageName = panelNames[panelNames.length - 1]
					loadPage = pageName;
				}
				else
				{
					loadPage = 'animal_cat_panel.php';
				}
				
				fetch(loadPage, {
					method: 'POST',
					body: JSON.stringify({
						gotoMain: (panelNames ? panelNames : (<?php echo json_encode($gotoMain); ?>) )
					}),
					 
					// Adding headers to the request
					headers: {
						"Content-type": "application/json; charset=UTF-8"
					}
				})
				.then(resp => resp.text())
				.then(htm => {
					$('#formarea').html(htm)
				})
			}
			
			
			$(document).ready(function(){
				loadInnerPanel()
			})
		</script>
    </body>
</html>