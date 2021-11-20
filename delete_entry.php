<?php
	$gotoMain = './';

	include($gotoMain.'db_const.php');

	// var_dump($_POST);

	$posted_json = json_decode(file_get_contents('php://input'), true);
	// var_dump($posted_json);
	
	$table_name = $posted_json['table_name'];
	$id = $posted_json['id'];

	// var_dump($con);

	if($con){
		$run_query = "update ". $table_name ." set deleted = 1 where id = '". $id ."'";
		

        $var = mysqli_query($con, $run_query);

        echo $var;
    }

?>
