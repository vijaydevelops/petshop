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
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel entry-carousel">
                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>customer_form.php"><h3>CUSTOMERS</h3></a>
							</div>
						</div>
                    </div>
					<div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>animal_cat_form.php"><h3>ANIMALS</h3></a>
							</div>
						</div>
                    </div>
                    <!--
                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>animal_type_form.php"><h3>ANIMAL TYPES</h3></a>
							</div>
						</div>
                    </div>
                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>animal_form.php"><h3>ANIMALS PETS</h3></a>
							</div>
						</div>
                    </div>
					-->

					<div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>bird_cat_form.php"><h3>BIRDS</h3></a>
							</div>
						</div>
                    </div>
					<!--
                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>bird_type_form.php"><h3>ANIMAL TYPES</h3></a>
							</div>
						</div>
                    </div>
                    <div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>bird_form.php"><h3>ANIMALS PETS</h3></a>
							</div>
						</div>
                    </div>
					-->
					<div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>sales.php"><h3>SALES ENTRY</h3></a>
							</div>
						</div>
                    </div>
					<div class="carousel-item">
						<div class="carousel-box" onclick="triggerInnerAnchorClick(event, this)">
							<div class="carousel-text">
								<a href="<?php echo $gotoMain; ?>entry_panel.php"><h3></h3></a>
							</div>
						</div>
                    </div>
					
                </div>
            </div>
        </div>
        <!-- Carousel End -->

<script>
	$(".carousel .entry-carousel").owlCarousel({
		autoplay: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: 4,
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