<?php
	$db_server = 'localhost';
	$db_user = 'root';
	$db_pwd = '';
	$db_name = 'petshop_management';

	try{
		error_reporting(0);
		$con = mysqli_connect($db_server, $db_user, $db_pwd, $db_name);
   		//change username and password according to your server settings
	} catch(Exception $ex){
		var_dump($ex);
	}
   	
   	if(mysqli_connect_errno())
	{ 
		die("could not connect - ".mysqli_connect_error());
	}
	
?>