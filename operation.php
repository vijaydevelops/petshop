<?php 
	
	function endsWith( $haystack, $needle ) {
	    $length = strlen( $needle );
	    if( !$length ) {
	        return true;
	    }
	    if($length > strlen($haystack)){
	    	return false;
	    }
	    // var_dump(substr( $haystack, strlen($haystack) - $length ));

	    return substr( $haystack, strlen($haystack) - $length ) == $needle;
	}

	// var_dump($_POST, $_FILES);

	if(!empty($_POST['id']) || $_POST['operation'] == 'edit'){
		$update = true;
	} else {
		$update = false;
	}

	$values = $_POST;

	$table_name = $_POST['table_name'];

	$query_txt = '';

	if(!$update){
		$query_txt .= "insert into ".$table_name;
	} else {
		$query_txt .= "update ".$table_name;
	}

	$query_txt .= " set ";

	foreach($_FILES as $posted_key => $posted_value){
		if(endsWith($posted_key, '_file')){
			//  has _file at last
			// var_dump($posted_key, $posted_value);

			$info = pathinfo($posted_value['name']);

			$ext = $info['extension']; // get the extension of the file
			$newname = strtolower($_POST['name']).".".$ext; 

			$target = 'img/entry/'.$_POST['table_name'].'/'.$newname;
			

			$file_dir = substr($target, 0, strrpos($target,'/') + 1);

			if (!is_dir($file_dir)) {
				mkdir($file_dir, 0777, true);
			}
			move_uploaded_file( $posted_value['tmp_name'], $target);

			$values[rtrim($posted_key, '_file')] = $target;
		}
	}

	// var_dump($values);

	foreach($values as $posted_key => $posted_value){
		
		if($posted_key != 'id' 
			&& $posted_key != 'table_name' 
			&& $posted_key != 'operation'
			&& !endsWith($posted_key, '_file') ){

			// var_dump($posted_key, $posted_value);

			$query_txt .= " $posted_key = '$posted_value' ,";
				
		}
	}

	$query_txt = rtrim($query_txt, ',');

	if(!$update){
		
	} else {
		$query_txt .= " where id = '".$_POST['id']. "'";
	}

	// var_dump($query_txt);

	// exit;

	$gotoMain = './';

	include($gotoMain.'db_const.php');

	if($con){
        $var = mysqli_query($con, $query_txt);

        echo $var;
    }

 ?>