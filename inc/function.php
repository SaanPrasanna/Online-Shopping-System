<?php 
	// Generating the customer index Number
	function customer_idx(){

		include('connection.php');

		$sql = "SELECT * FROM customer;";
		$count = mysqli_num_rows(mysqli_query($conn,$sql)) + 1;

		$idx = "";
		if($count < 10){
			$idx = "C000".$count;
		}else if($count < 100){
			$idx = "C00".$count;
		}else if($count	< 1000){
			$idx = "C0".$count;
		}else if($count < 10000){
			$idx = "C0".$count;
		}

		return $idx;
	}

	function supplier_id(){

		include('connection.php');

		$sql = "SELECT * FROM supplier;";
		$count = mysqli_num_rows(mysqli_query($conn,$sql)) + 1;

		$id = "";
		if($count < 10){
			$id = "S000".$count;
		}else if($count < 100){
			$id = "S00".$count;
		}else if($count	< 1000){
			$id = "S0".$count;
		}else if($count < 10000){
			$id = "S0".$count;
		}

		return $id;
	}

	function co_id(){

		include('connection.php');

		$sql = "SELECT * FROM courier;";
		$count = mysqli_num_rows(mysqli_query($conn,$sql)) + 1;

		$id = "";
		if($count < 10){
			$id = "C000".$count;
		}else if($count < 100){
			$id = "C00".$count;
		}else if($count	< 1000){
			$id = "C0".$count;
		}else if($count < 10000){
			$id = "C0".$count;
		}

		return $id;
	}


	function manage_id(){

		include('connection.php');

		$sql = "SELECT * FROM manage;";
		$count = 0;
		try {	
			$count = mysqli_num_rows(mysqli_query($conn,$sql)) + 1;
		} catch (Exception $e) {

		}

		$id = "";
		if($count < 10){
			$id = "M000".$count;
		}else if($count < 100){
			$id = "M00".$count;
		}else if($count	< 1000){
			$id = "M0".$count;
		}else if($count < 10000){
			$id = "M0".$count;
		}

		return $id;
	}
	
	//Check Customer email already in the Table | Database
	function check_cemail($email){
		include('connection.php');

		$sql = "SELECT * FROM customer WHERE email = '{$email}';"; 
		$count = mysqli_num_rows(mysqli_query($conn,$sql));
		return $count;
	}

	//Generating the discount
	function discount($price,$category){
		include('connection.php');
		$new_price = 0;

		$sql = "SELECT rating FROM discount WHERE category = '{$category}' LIMIT 1;";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_assoc($result);
			$rating = $row['rating'];
			$new_price = $price - ($price * $rating/100);
			$new_price = number_format((float)$new_price, 2, '.', '');
			return $new_price;
		}

	}

	//Generating the order number
	function getorder_id(){
		include('connection.php');
		$new_price = 0;

		date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
		$sql = "SELECT distinct(order_id) FROM orders;";
		$result = mysqli_query($conn,$sql);

		$count = mysqli_num_rows($result) + 1 ;
		$today = date("Ymd");

		if($count < 10){
			$rand = strtoupper(substr(uniqid(sha1(time())),0,3));
		}else if($count < 100){
			$rand = strtoupper(substr(uniqid(sha1(time())),0,2));
		}else if($count	< 1000){
			$rand = strtoupper(substr(uniqid(sha1(time())),0,1));
		}
		return $today.$rand.$count;	
	}

	function getP_id(){
		include('connection.php');
		$new_price = 0;

		date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
		$sql = "SELECT * FROM product;";
		$result = mysqli_query($conn,$sql);

		$count = mysqli_num_rows($result) + 1 ;
		$today = date("Ymd");

		return "P".$today.$count;	
	}
	
	function rand_courier(){
		include('connection.php');

		$sql = "SELECT co_id FROM courier ORDER BY RAND() LIMIT 1;";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		return $row['co_id'];
	}


	function find_category($p_id){
		include('connection.php');

		$sql = "SELECT category FROM product WHERE p_id = '{$p_id}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['category'];
	}

	function available_qty($p_id){
		include('connection.php');

		$sql = "SELECT qty FROM product WHERE p_id = '{$p_id}' LIMIT 1;";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['qty'];		
	}


	function check_username($username){
		include('connection.php');

		$sql = "SELECT * FROM administrator WHERE username = '{$username}';"; 
		$count = mysqli_num_rows(mysqli_query($conn,$sql));
		return $count;
	}


?>

