<?php 
	session_start();
	include('../connection.php');

	if(isset($_POST['type'])){		
		if(($_POST['type']) == 'customer'){

			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$pw = mysqli_real_escape_string($conn,$_POST['pw']);

			$remember = $_POST['remember'];
			$hash = sha1($pw); //Generating the sha1 algorithm

			$sql = "SELECT fname,cid FROM customer WHERE email = '{$email}' AND password = '{$hash}' LIMIT 1;";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 1){

				$row = mysqli_fetch_assoc($result);
				//valid User found
				if($remember == "true"){
					// Set cookie 
					setcookie('fname',$row['fname'],time()+(60*60*72),"/");
					$_SESSION['cid'] = $row['cid'];
				}else{
					//Set Session
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['cid'] = $row['cid'];
				}

				echo "true";

			}else{
				echo "Username or Password Invalid";
			}

		}

		if(($_POST['type']) == 'administrator'){
			$uname = mysqli_real_escape_string($conn,$_POST['uname']);
			$pw = mysqli_real_escape_string($conn,$_POST['pw']);
			$remember = $_POST['remember'];

			$hash = sha1($pw); //Generating the sha1 algorithm

			$sql = "SELECT username FROM administrator WHERE username = '{$uname}' AND password = '{$hash}' LIMIT 1;";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result) == 1){

				$row = mysqli_fetch_assoc($result);
				//valid User found
				if($remember == "remember_me"){
					// Set cookie 
					setcookie('uname',$row['username'],time()+(60*60*72),"/");
				}else{
					//Set Session
					$_SESSION['uname'] = $row['username'];
				}

				echo "true";

			}else{
				echo "Username or Password Invalid";
			}
		}
	}
?>