<?php 
	include('../connection.php');
	
	if(isset($_POST['chart'])){	
		if($_POST['chart'] == 'line_chart'){
			$sql = 'SELECT date,SUM(amount) as "amount" FROM orders GROUP BY(date) ORDER BY date,time DESC LIMIT 10;';
			$result = mysqli_query($conn, $sql);
			$dates = array();
			$prices = array();

			foreach ($result as $keys => $values) {
				$dates[] = $values['date'];
				$prices[] = $values['amount'];
			}

			$data = array(
				'dates' => $dates,
				'prices' => $prices
			);

			echo json_encode($data);
		}

		if($_POST['chart'] == 'pie_chart'){
			$sql = 'SELECT category, amount FROM chart_category_view;';
			$result = mysqli_query($conn, $sql);
			$category = array();
			$amount = array();

			foreach ($result as $keys => $values) {
				$category[] = $values['category'];
				$amount[] = $values['amount'];
			}

			$data = array(
				'category' => $category,
				'amount' => $amount
			);

			echo json_encode($data);
		}

		if($_POST['chart'] == 'horizontal_chart'){
			$sql = 'SELECT category, qty FROM chart_qty_view;';
			$result = mysqli_query($conn, $sql);
			$category = array();
			$qty = array();

			foreach ($result as $keys => $values) {
				$category[] = $values['category'];
				$qty[] = $values['qty'];
			}

			$data = array(
				'category' => $category,
				'qty' => $qty
			);

			echo json_encode($data);
		}	
	}

?>