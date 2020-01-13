<?php
	session_start();
	include('../connection.php');
	include('../function.php');


	if(isset($_POST['operation'])){

		if(isset($_POST['type'])){

			if($_POST['type'] == 'product'){

				$operation = mysqli_real_escape_string($conn, $_POST['operation']);
				$name = mysqli_real_escape_string($conn, $_POST['name']);
				$category = mysqli_real_escape_string($conn, $_POST['category']);
				$description = mysqli_real_escape_string($conn, $_POST['description']);
				$s_price = mysqli_real_escape_string($conn, $_POST['s_price']);
				$u_price = mysqli_real_escape_string($conn, $_POST['u_price']);
				$warranty = mysqli_real_escape_string($conn, $_POST['warranty']);
				$reorder = mysqli_real_escape_string($conn, $_POST['reorder']);
				$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);


				if($_POST['operation'] == "Add_product"){

					if($_FILES['image']['name'] != ""){

						$test = explode(".", $_FILES['image']['name']);
						$extension = end($test);
						$img_name = rand(100, 999999999).'.'.$extension; //Geneting the random name to the uploaded image
						$uploadOk = 1;
						$location = './../../img/products/'.$img_name; //Real location to save the image
						$img_dblocation = 'img/products/'.$img_name; //Db image location
						$type = pathinfo($location,PATHINFO_EXTENSION);
						$validate_extension = array('jpg','jpeg','png');

						if(!in_array(strtolower($type), $validate_extension)){//Validating the image extension
							$uploadOk = 0;
						}

						if($uploadOk != 0){
							if(move_uploaded_file($_FILES['image']['tmp_name'], $location)){
								$sql = "INSERT INTO product VALUES('{$p_id}','{$name}','{$img_dblocation}','{$category}','{$description}',12,$s_price,$u_price,$reorder,0,0,0,0)";
								if(mysqli_query($conn, $sql)){
									echo 'insert';
								}else{
									echo "Database Failed";
								}
							}else{
								echo "Upload Location not found! ";
							}
						}else{
							echo "Upload Only Jpg Jpeg Png only!";
						}

					}else{
						echo "Image Name Can't be empty!";
					}
				}


				if($_POST['operation'] == 'Edit_product'){

					if($_FILES['image']['name'] != ""){

						$test = explode(".", $_FILES['image']['name']);
						$extension = end($test);
						$img_name = rand(100, 999999999).'.'.$extension; //Geneting the random name to the uploaded image
						$uploadOk = 1;
						$location = './../../img/products/'.$img_name; //Real location to save the image
						$img_dblocation = 'img/products/'.$img_name; //Db image location
						$type = pathinfo($location,PATHINFO_EXTENSION);
						$validate_extension = array('jpg','jpeg','png');

						if(!in_array(strtolower($type), $validate_extension)){//Validating the image extension
							$uploadOk = 0;
						}

						if($uploadOk != 0){
							if(move_uploaded_file($_FILES['image']['tmp_name'], $location)){
								$sql = "UPDATE product SET name = '{$name}', image = '{$img_dblocation}',category = '{$category}', description = '{$description}',warranty = $warranty, s_price = $s_price, u_price = $u_price, re_order = $reorder WHERE p_id = '{$p_id}';";
								if(mysqli_query($conn, $sql)){
									echo "update";
								}else{
									echo "Database Failed";
								}
							}else{
								echo "Upload Location not found! ";
							}
						}else{
							echo "Upload Only Jpg Jpeg Png only!";
						}

					}else{
						echo "Image Name Can't be empty!";
					}
				}
			}


			//Supplier Operation part
			if ($_POST['type'] == 'supplier') {

				$company = mysqli_real_escape_string($conn, $_POST['company']);
				$number = mysqli_real_escape_string($conn, $_POST['number']);
				$address = mysqli_real_escape_string($conn, $_POST['address']);

				if($_POST['operation'] == 'Add_supplier'){
					$supplier_id = supplier_id();

					$sql1 = "INSERT INTO supplier VALUES('{$supplier_id}','{$company}','{$address}',0);";
					$sql2 = "INSERT INTO supplier_contacts VALUES('{$supplier_id}','{$number}');";

					if(mysqli_query($conn, $sql1)){
						mysqli_query($conn, $sql2);
						echo 'insert';
					}else{
						echo "Database Failed";
					}
				}

				if($_POST['operation'] == 'Edit_supplier'){
					$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
					$sql1 = "UPDATE supplier SET company = '{$company}', address = '{$address}' WHERE supplier_id = '{$supplier_id}';";
					$sql2 = "UPDATE supplier_contacts SET number = '{$number}' WHERE supplier_id = '{$supplier_id}';";

					if(mysqli_query($conn, $sql1)){
						mysqli_query($conn, $sql2);
						echo 'update';
					}else{
						echo "Database Failed";
					}
				}

			}

			//Courier Operation part
			if ($_POST['type'] == 'courier') {

				$fname = mysqli_real_escape_string($conn, $_POST['fname']);
				$lname = mysqli_real_escape_string($conn, $_POST['lname']);
				$number = mysqli_real_escape_string($conn, $_POST['number']);
				$address = mysqli_real_escape_string($conn, $_POST['address']);

				if($_POST['operation'] == 'Add_courier'){
					$co_id = co_id();

					$sql1 = "INSERT INTO courier VALUES('{$co_id}','{$fname}','{$lname}','{$address}',0);";
					$sql2 = "INSERT INTO courier_contact VALUES('{$co_id}','{$number}');";

					if(mysqli_query($conn, $sql1)){
						mysqli_query($conn, $sql2);
						echo 'insert';
					}else{
						echo "Database Failed";
					}
				}

				if($_POST['operation'] == 'Edit_courier'){
					$co_id = mysqli_real_escape_string($conn, $_POST['co_id']);
					$sql1 = "UPDATE courier SET fname = '{$fname}', lname = '{$lname}',address = '{$address}' WHERE co_id = '{$co_id}';";
					$sql2 = "UPDATE courier_contact SET number = '{$number}' WHERE co_id = '{$co_id}';";

					if(mysqli_query($conn, $sql1)){
						mysqli_query($conn, $sql2);
						echo 'update';
					}else{
						echo "Database Failed";
					}
				}

			}

			//Administrator operational part
			if($_POST['type'] == 'administrator'){
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$fname = mysqli_real_escape_string($conn, $_POST['fname']);
				$lname = mysqli_real_escape_string($conn, $_POST['lname']);
				$address = mysqli_real_escape_string($conn, $_POST['address']);
				$number = mysqli_real_escape_string($conn, $_POST['number']);

				if($_POST['operation'] == 'Add_administrator'){

					if(check_username($username) == 0){

						$password = mysqli_real_escape_string($conn, $_POST['password']);
						$hash = sha1($password);

						$sql1 = "INSERT INTO administrator VALUES('{$username}','{$hash}','{$fname}','{$lname}','{$address}',0);";
						$sql2 = "INSERT INTO admin_contact VALUES('{$username}','{$number}');";

						if(mysqli_query($conn, $sql1)){
							mysqli_query($conn, $sql2);
							echo 'insert';
						}else{
							echo "Database Failed";
						}
					}else{
						echo "Username Already Exists";
					}

				}

				if($_POST['operation'] == 'Edit_administrator'){

					$sql1 = "UPDATE administrator SET fname = '{$fname}', lname = '{$lname}',address = '{$address}' WHERE username = '{$username}';";
					$sql2 = "UPDATE admin_contact SET number = '{$number}' WHERE username = '{$username}';";

					if(mysqli_query($conn, $sql1)){
						mysqli_query($conn, $sql2);
						echo 'update';
					}else{
						echo "Database Failed";
					}
				}				
			}
		}

		//Removing the products in the database , Actually not Deleting only updating the remove 0 value to 1
		if($_POST['operation'] == "remove_product"){
			$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
			$sql = "UPDATE product SET remove = 1 WHERE p_id = '{$p_id}';";
			if(mysqli_query($conn, $sql)){
				echo "remove";
			}else{
				echo "Database Failed";
			}
		}

		//Removing the products in the database , Actually not Deleting only updating the remove 0 value to 1
		if($_POST['operation'] == "manage"){
			date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
			$nowdate = date('Y-m-d');
			$nowtime = date('H:i:s');
			$manage_id = manage_id();
			$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
			$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
			$qty = mysqli_real_escape_string($conn, $_POST['qty']);
			$username = $_SESSION['uname'];

			$sql = "INSERT INTO manage VALUES('{$manage_id}','{$username}','{$p_id}','{$supplier_id}',$qty,'{$nowdate}','{$nowtime}');";
			$available_qty = available_qty($p_id);
			if(mysqli_query($conn, $sql)){
				$qty = $available_qty + $qty;
				$sql_update = "UPDATE product SET qty = $qty WHERE p_id = '{$p_id}';";
				if(mysqli_query($conn, $sql_update)){
					echo "success";
				}else{
					echo "Database Failed";
				}
			}else{
				echo "Please check the Product ID";
			}
		}

		if($_POST['operation'] == "remove_supplier"){
			$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
			$sql = "UPDATE supplier SET remove = 1 WHERE supplier_id = '{$supplier_id}';";
			if(mysqli_query($conn, $sql)){
				echo "remove";
			}else{
				echo "Database Failed";
			}
		}

		if($_POST['operation'] == "remove_administrator"){

			$uname = "";
			if(isset($_SESSION['uname'])){
				$uname = $_SESSION['uname'];
			}else if(isset($_COOKIE['uname'])){
				$uname = $_COOKIE['uname'];
			}

			$username = mysqli_real_escape_string($conn, $_POST['username']);
			if(($_POST['username']) != trim($uname)){			
				$sql = "UPDATE administrator SET remove = 1 WHERE username = '{$username}';";
				if(mysqli_query($conn, $sql)){
					echo "remove";
				}else{
					echo "Database Failed";
				}
			}else{
				echo "You can't remove your account";
			}
		}

		if($_POST['operation'] == "remove_courier"){
			$co_id = mysqli_real_escape_string($conn, $_POST['co_id']);
			$sql = "UPDATE courier SET remove = 1 WHERE co_id = '{$co_id}';";
			if(mysqli_query($conn, $sql)){
				echo "remove";
			}else{
				echo "Database Failed";
			}
		}		

		if($_POST['operation'] == 'finish_order'){
			date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
			$nowdate = date('Y-m-d');
			$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
			$sql = "UPDATE orders SET finishing_date = '{$nowdate}' WHERE order_id = '{$order_id}';";
			if(mysqli_query($conn, $sql)){
				echo "success";
			}else{
				echo "Database Failed";
			}
		}

		//Updating the discounts
		if($_POST['operation'] == 'discount'){

			$error = 0;
			$category = array('accessorie','desktop','laptop','monitor','printer','software');
			$rating = array($_POST['accessorie'],$_POST['desktop'],$_POST['laptop'],$_POST['monitor'],$_POST['printer'],$_POST['software']);
			for ($i=0; $i < 6; $i++) { 
				$sql = "UPDATE discount SET rating = $rating[$i] WHERE category = '{$category[$i]}';";
				if(mysqli_query($conn, $sql)){
					
				}else{
					$error = $error +1;
				}
			}
			if($error != 0){
				echo "Database Failed";
			}else{
				echo "Success";
			}
		}

	}else{
		// header('location:index.php');
	}

?>
