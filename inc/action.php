<?php 
	include 'connection.php';
	include('function.php');
	session_start();

	if(isset($_POST['action'])){

		if($_POST['action'] == 'add'){

			// To data senilize 
			$product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
			$product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
			$product_price = mysqli_real_escape_string($conn,$_POST['product_price']);
			$product_qty = mysqli_real_escape_string($conn,$_POST['product_qty']);
			
			if(isset($_SESSION['shopping_cart'])){

				$is_available = 0;
				foreach ($_SESSION["shopping_cart"] as $keys => $values) {
					if ($_SESSION["shopping_cart"][$keys]['product_id'] == $product_id) {
						$is_available++;
						if(available_qty($product_id) >= ($values['product_qty'] + $product_qty)){
							$_SESSION["shopping_cart"][$keys]['product_qty'] = $_SESSION["shopping_cart"][$keys]['product_qty'] + $product_qty;
						}else{
							$_SESSION["shopping_cart"][$keys]['product_qty'] = available_qty($product_id);
						}
					}
				}

				if ($is_available == 0) {
					if(available_qty($product_id) >= $product_qty){					
						$item_array = array(
						  'product_id'  =>   $product_id,
						  'product_name' => $product_name,
						  'product_price' => $product_price,
						  'product_qty' => $product_qty
						);
					}else{
						$item_array = array(
						  'product_id'  =>   $product_id,
						  'product_name' => $product_name,
						  'product_price' => $product_price,
						  'product_qty' => available_qty($product_id)
						);						
					}
					$_SESSION['shopping_cart'][] = $item_array;

				}

			}else{

				if(available_qty($product_id) >= $product_qty){				
					$items_array = array(
						'product_id' => $product_id,
						'product_name' => $product_name,
						'product_price' => $product_price,
						'product_qty' => $product_qty
					);
				}else{
					$items_array = array(
						'product_id' => $product_id,
						'product_name' => $product_name,
						'product_price' => $product_price,
						'product_qty' => available_qty($product_id)
					);
				}

				$_SESSION['shopping_cart'][] = $items_array;

			}
		}

		if($_POST['action'] == 'remove'){

			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
				  $_SESSION["shopping_cart"][$keys]['product_qty'] = $_SESSION["shopping_cart"][$keys]['product_qty'] - $_POST["product_qty"];
				}
			}

		}

		if($_POST['action'] == 'delete'){
			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				if ($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"]) {
					unset($_SESSION["shopping_cart"][$keys]);
				}
			}			
		}

		if($_POST['action'] == 'empty'){
			unset($_SESSION['shopping_cart']);
		}

	}

	if(isset($_POST['operation'])){
		if ($_POST['operation'] == 'change') {

			$cid = mysqli_real_escape_string($conn, $_POST['cid']);
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$number = mysqli_real_escape_string($conn, $_POST['number']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$hash = sha1($password);

			$sql1 = "UPDATE customer SET fname = '{$fname}', lname = '{$lname}', password = '{$hash}' WHERE cid = '{$cid}';";
			$sql2 = "UPDATE customer_contact SET number = '{$number}' WHERE cid = '{$cid}';";

			if(mysqli_query($conn, $sql1)){
				mysqli_query($conn, $sql2);
				echo 'update';
			}else{
				echo "Update Failed";
			}

		}
	}

?>