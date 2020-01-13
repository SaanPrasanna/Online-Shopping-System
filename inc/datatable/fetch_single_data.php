<?php 
include('../connection.php');

	if(isset($_POST['p_id'])){
		$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
		$output = array();

		$sql = "SELECT * FROM product WHERE p_id = '{$p_id}' LIMIT 1";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1 ){

			$row = mysqli_fetch_assoc($result);
			foreach ($result as $key => $row) {
				$output['p_id'] = $row['p_id'];
				$output['name'] = $row['name'];
				$output['category'] = $row['category'];
				$output['warranty'] = $row['warranty'];
				$output['s_price'] = $row['s_price'];
				$output['u_price'] = $row['u_price'];
				$output['re_order'] = $row['re_order'];
				$output['qty'] = $row['qty'];
				$output['description'] = explode("<br>",$row['description']);
			}

			echo json_encode($output);
		}else{

		}
	}
	

	if(isset($_POST['supplier_id'])){
		$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
		$output = array();

		$sql = "SELECT * FROM supplier_view WHERE supplier_id = '{$supplier_id}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1 ){

			$row = mysqli_fetch_assoc($result);
			foreach ($result as $key => $row) {
				$output['supplier_id'] = $row['supplier_id'];
				$output['company'] = $row['company'];
				$output['number'] = $row['number'];
				$output['address'] = $row['address'];
			}
			echo json_encode($output);
		}else{
			
		}
	}

	if(isset($_POST['username'])){
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$output = array();

		$sql = "SELECT * FROM administrator_view WHERE username = '{$username}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1 ){

			$row = mysqli_fetch_assoc($result);
			foreach ($result as $key => $row) {
				$output['username'] = $row['username'];
				$output['fname'] = $row['fname'];
				$output['lname'] = $row['lname'];
				$output['number'] = $row['number'];
				$output['address'] = $row['address'];
			}
			echo json_encode($output);
		}else{
			
		}
	}

	if(isset($_POST['co_id'])){
		$co_id = mysqli_real_escape_string($conn, $_POST['co_id']);
		$output = array();

		$sql = "SELECT * FROM courier_view WHERE co_id = '{$co_id}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1 ){

			$row = mysqli_fetch_assoc($result);
			foreach ($result as $key => $row) {
				$output['co_id'] = $row['co_id'];
				$output['fname'] = $row['fname'];
				$output['lname'] = $row['lname'];
				$output['number'] = $row['number'];
				$output['address'] = $row['address'];
			}
			echo json_encode($output);
		}else{
			
		}
	}


	if(isset($_POST['discount'])){
		$_POST['discount'] == 'discount';
		$sql = 'SELECT category, rating FROM discount;';
		$result = mysqli_query($conn, $sql);
		$category = array();
		$rating = array();

		foreach ($result as $keys => $values) {
			$category[] = $values['category'];
			$rating[] = $values['rating'];
		}

		$data = array(
			'category' => $category,
			'rating' => $rating
		);

		echo json_encode($data);
	}

	if(isset($_POST['order_details'])){
		$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
		$output = array();

		$sql = "SELECT * FROM orderdetails_view WHERE order_id = '{$order_id}';";

		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);
		foreach ($result as $key => $row) {
			$output[0][] = $row['p_id'];
			$output['order_id'] = $row['order_id'];
			$output[1][] = $row['qty'];

		}

		$data = array(
			'p_id' => $output[0],
			'order_id' => $output['order_id'],
			'qty' => $output[1]
		);
		echo json_encode($data);

	}	
	
	if(isset($_POST['cid'])){
		$cid = mysqli_real_escape_string($conn, $_POST['cid']);
		$output = array();

		$sql = "SELECT * FROM customer_view WHERE cid = '{$cid}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 1 ){

			$row = mysqli_fetch_assoc($result);
			foreach ($result as $key => $row) {
				$output['cid'] = $row['cid'];
				$output['fname'] = $row['fname'];
				$output['lname'] = $row['lname'];
				$output['number'] = $row['number'];
				$output['email'] = $row['email'];
			}
			echo json_encode($output);
		}else{
		}
	}
?>