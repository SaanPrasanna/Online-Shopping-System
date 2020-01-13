<?php 
	//Database Connection
	$server = "localhost";
	$user = "root";
	$pw = "";
	$db = "oss";

	$conn = mysqli_connect($server,$user,$pw,$db) or die('Database Connetion Failed !.');

?>