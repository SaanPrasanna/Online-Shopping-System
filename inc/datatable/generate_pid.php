<?php 

	include('../connection.php');
	$new_price = 0;

	date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
	$sql = "SELECT * FROM product;";
	$result = mysqli_query($conn,$sql);

	$count = mysqli_num_rows($result) + 1 ;
	$today = date("Ymd");
	echo "P".$today.$count;	

?>
