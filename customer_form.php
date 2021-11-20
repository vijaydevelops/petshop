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


<?php
 session_start();
 if(isset($_SESSION['user']))
 {

 }
 else{
 
 }
?>

<div class="topnav">
            <a class="active" href="home.html"><img src="customers.png"></a>
            <a href="customer.php">Customers</a>
            <div class="topnav-right">
             
            </div>
          </div>
          <div class="custombutton">         
<form>
<button   style=" height: 50px;width: 150px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;" formaction="customeradd.php">Add new customer</button>
</form>
</div>
    <?php
   
$con = mysqli_connect("localhost","root","","Petshop_management");//change username and password according to your server settings
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from customer ");
echo "<table>";
echo "<tr>
<th>cs_ID</th>
<th>cs name</th>
<th>cs product</th>
<th>cs phoneno</th>
<th>date</th>
</tr>";
if(mysqli_num_rows($var)>0){
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$arr[0]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[3]</td>
    <td>$arr[4]</td>
    </tr>";}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
<form action="deletecustomer.php" method="post">
<input  id="dbutton" type="text" name="t1" placeholder="Enter the id to delete" required>
    <input  style="width:75px;height:44px;cursor:pointer;border-radius:15px;
border: 3px solid  #b40a70;background-color: #8d2663;color:#f2f2f2;font-size:15px;"type="submit" value="Delete">
</form> 

		