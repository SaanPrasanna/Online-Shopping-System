<?php 
	session_start();
	include('connection.php');
	include('function.php');

	$total_price = mysqli_real_escape_string($conn,$_POST['total_price']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$city = mysqli_real_escape_string($conn,$_POST['city']);
	$postal_code = mysqli_real_escape_string($conn,$_POST['postal_code']);
	$transaction_id = mysqli_real_escape_string($conn,$_POST['transaction_id']);
	$order_id = getorder_id(); //Generating the order id
	date_default_timezone_set("Asia/Colombo"); //Setup the time zone to our country
	$date = date('Y-m-d');
	$time = date('H:i:s');
	$cid = $_SESSION['cid']; //Getting the logged customer id
	$co_id = rand_courier(); //Random Courier ID 
	$fdate = null;

	//Inserting the order table data
	$sql_order = "INSERT INTO orders VALUES('{$order_id}',$total_price,'{$time}','{$date}','{$fdate}','{$transaction_id}');";
	mysqli_query($conn,$sql_order);

	//Inserting the manage_orders data
	$sql_makes_order = "INSERT INTO makes_order VALUES('{$cid}','{$order_id}','{$address}','{$city}','{$postal_code}');";
	mysqli_query($conn,$sql_makes_order);

	//Inserting the ships_orders data
	$sql_ships_orders = "INSERT INTO ships_orders VALUES('{$co_id}','{$order_id}');";
	mysqli_query($conn,$sql_ships_orders); 

	//Inserting the order_include data
	foreach ($_SESSION['shopping_cart'] as $keys => $values) {
		$p_id = $values['product_id'];
		$u_price = discount($values['product_price'],find_category($p_id)); //Getting the price if including the discounts, calling two functions
		$qty = $values['product_qty'];

		$sql_order_include = "INSERT INTO order_include VALUES('{$order_id}','{$p_id}',$u_price,$qty);";
		mysqli_query($conn,$sql_order_include); 

		$now_qty =  available_qty($p_id) - $qty;
		$sql_product = "UPDATE product SET qty = $now_qty WHERE p_id = '{$p_id}';";
		mysqli_query($conn, $sql_product);
	}



	echo "true";
?>