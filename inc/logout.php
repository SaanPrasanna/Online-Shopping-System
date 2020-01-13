<?php 
	session_start();

	if(isset($_SESSION['fname'])){
		unset($_SESSION["fname"]);
		unset($_SESSION["cid"]);
		header('location: ../index.php?logout=successfuly&destroy_session');
	}else{
		$x = true;
	}
	if(isset($_COOKIE['fname'])){
		setcookie('fname', '', time() - 3600, '/');
		unset($_SESSION["cid"]);
		header('location: ../index.php?logout=successfuly&destroy_cookie');
	}else{
		$y = true;
	}

	if(($x == true) && ($y == true)){
		header('location: ../index.php?non');
	}

?>