<?php 
	session_start();
	include('../connection.php');
	include('../function.php');

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pw = mysqli_real_escape_string($conn,$_POST['pw']);
	$hash = sha1($pw); //Generating the sha1 algorithm
	$cid = customer_idx();
	$msg = "";
	if(check_cemail($email) == 0){		
		$sql = "INSERT INTO customer VALUES('{$cid}','{$fname}','{$lname}','{$email}','{$hash}');";

		if(mysqli_query($conn,$sql)){
			$msg = "true";
		}else{
			$msg = "Database Failed ! ";
		}
	}else{
		$msg = "Email Already registered !";
	}

	echo $msg;
?>