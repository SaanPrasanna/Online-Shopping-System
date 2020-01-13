<?php
	
	include('../connection.php');

	$query = "SELECT * FROM supplier WHERE supplier_id LIKE '%" . $_POST['query'] . "%' AND remove = 0;";
	$result = mysqli_query($conn,$query);
	$data = array();

	if ($result) {

		foreach ($result as $keys => $values) {
			$data[] = $values["supplier_id"];
		}
	    echo json_encode($data);
	}

?>