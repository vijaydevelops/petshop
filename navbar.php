		<?php 
		
		if(!isset($gotoMain))
		{
			$gotoMain = './';
		}
		
		?>
		
		<!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">

                            <a href="<?php echo $gotoMain; ?>" class="nav-item nav-link">HOME</a>


                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">PETS</a>
                                <div class="dropdown-menu">
                                    <a href="<?php echo $gotoMain; ?>animal_cat.php" class="dropdown-item">Animals</a>
                                    <a href="<?php echo $gotoMain; ?>bird_cat.php" class="dropdown-item">Birds</a>
                                </div>
                            </div>
                           
                            
                            

                            <a href="<?php echo $gotoMain; ?>sales" class="nav-item nav-link">REPORT</a>

							<a href="<?php echo $gotoMain; ?>sales" class="nav-item nav-link">SALES</a>

                            <a href="<?php echo $gotoMain; ?>special.php" class="nav-item nav-link">SPECIAL OFFER</a>

                            <a href="<?php echo $gotoMain; ?>entry.php" class="nav-item nav-link">DATA ENTRY</a>

                            
                        </div>
                    </div>

                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->