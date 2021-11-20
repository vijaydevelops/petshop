<?php 
$posted_json = json_decode(file_get_contents('php://input'), true);

if(isset($posted_json['gotoMain'])){
	
	$gotoMain = '';
	if(is_array($posted_json['gotoMain'])){
		for($i=0; $i < count($posted_json['gotoMain']) - 1; $i++){
			$gotoMain .= $posted_json['gotoMain'][$i].'/';
		}
	} else {
		$gotoMain = $posted_json['gotoMain'];
	}
	
	
	
} else {
	$gotoMain = './';
}
?>

<!-- Carousel Start -->
<?php  

	include($gotoMain.'db_const.php');

	$no_of_animal_cat = 0;

	if($con){
        $var = mysqli_query($con,"select * from animal_cat where deleted = 0");

        $no_of_animal_cat = mysqli_num_rows($var);

        if(mysqli_num_rows($var)>0){
            $i=0;
        ?>

        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel anicat-carousel">
                <?php
                	while($arr=mysqli_fetch_assoc($var))
                	{
                    	$i++;
            		?>

                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)" style="background: url('<?php echo $arr['picfilepath']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;">

							<div class="carousel-text" style="text-align: center; width: 90%; margin-top: calc( 20vh + 40px ); color: #333 !important;
								text-shadow: 0px -1px 0px rgba(255,255,255,.5); /* 50% white from top */">
								<a href="<?php echo $gotoMain; ?>animal_type_panel.php?cat_id=<?php echo $arr['id']; ?>">
									<h3><?php echo $arr['name']; ?></h3>
								</a>
							</div>
						</div>
                    </div>
                    <?php
                	}
            	?>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        <?php 
    	}
	}
    ?>

<script>
	$(".carousel .anicat-carousel").owlCarousel({
		autoplay: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: ( <?php echo $no_of_animal_cat; ?> < 3 ? <?php echo $no_of_animal_cat ?> : 3 ),
		smartSpeed: 300,
		dots: false,
		loop: true,
		nav : true,
		navText : [
			'<i class="fa fa-angle-left" aria-hidden="true"></i>',
			'<i class="fa fa-angle-right" aria-hidden="true"></i>'
		]
	});
</script>