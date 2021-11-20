<?php 
$posted_json = json_decode(file_get_contents('php://input'), true);

if(isset($posted_json['gotoMain'])){
	
	$gotoMain = '';
	if(is_array($posted_json['gotoMain'])) {
		for($i=0; $i < count($posted_json['gotoMain']) - 1; $i++){
			$gotoMain .= $posted_json['gotoMain'][$i].'/';
		}
	} else {
		$gotoMain = $posted_json['gotoMain'];
	}
	
	
	
} else {
	$gotoMain = './';
}

$animal_type_id = $_GET['type_id'];
?>

<!-- Carousel Start -->
<?php  

	include($gotoMain.'db_const.php');

	$no_of_animal_cat = 0;

	if($con){
        $var = mysqli_query($con,"select * from animals where deleted = 0 and animal_type_id='".$animal_type_id."'");

        $no_of_animal_cat = mysqli_num_rows($var);

        if(mysqli_num_rows($var)>0){
            $i=0;
        ?>

        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel ani-carousel">
                <?php
                	while($arr=mysqli_fetch_assoc($var))
                	{
                    	$i++;
            		?>

                    <div class="carousel-item">
						<div class="carousel-box" onclick="purchasePet($arr['id'], this)" style="background: url('<?php echo $arr['picfilepath']; ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;">

							<div class="carousel-text" style="text-align: center; width: 90%; margin-top: calc( 20vh + 40px ); color: #333 !important;
								text-shadow: 0px -1px 0px rgba(255,255,255,.5); /* 50% white from top */">
								<a href="javascript:void(0);" onclick="purchasePet($arr['id'])">
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
	$(".carousel .ani-carousel").owlCarousel({
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