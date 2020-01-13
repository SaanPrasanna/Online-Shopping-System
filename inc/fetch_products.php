<?php 
	include('connection.php');
	include('function.php');
	$sql = "SELECT * FROM product WHERE remove = 0 ORDER BY RAND() LIMIT 10;";
	$result = mysqli_query($conn,$sql);
	$output = "";

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){	
			$price = discount($row['u_price'], $row['category']);

									//Showing discount 
			if ($row['u_price'] != $price) {
				$update = '<s class="text-secondary">Rs. ' . $row['u_price'] . ' </s><br>
				<span class="text-danger"> Rs.' . $price . ' </span><sup><span class="badge badge-danger">New</span></sup>';
			} else {
				$update = '<span>&nbsp<span><br><span class="text-primary">Rs. ' . $row['u_price'] . '</span>';
			}
	
			$output .='<div class="my-3 my-md-0" style="width:260px;height:auto;border:1px solid #ddd;border-radius:5px;">
						<form>
							<div class="card shadow">
								<div>
									<a href="product-details.php?id='.base64_encode($row['p_id']).'"><img src="'.$row['image'].'" alt="pic" class="img-fluid card-img-top my-2 product-img"></a>
								</div>
								<div class="card-body">
									<h6 class="card-title"><a href="product-details.php?id='.base64_encode($row['p_id']).'" style="color:#000;">'.$row['name'].'</a></h6>
									<h6>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									</h6>
									<div class="badge badge-primary text-wrap">
										'.$row['category'].'
									</div>
									<h5>
										'.$update.'
									</h5>
									<input type="hidden" name="hidden_name" id="name'.$row["p_id"].'" value="'.$row["name"].'" />
						            <input type="hidden" name="hidden_price" id="price'.$row["p_id"].'" value="'.$row["u_price"].'" />
						            <input type="hidden" name="hidden_price" id="qty'.$row["p_id"].'" value="'.$row["qty"].'" />
									<button type="button" class="btn btn-warning my-2 add_to_cart" name="add" id="'.$row["p_id"].'">Add to Cart</button>
								</div>
							</div>
						</form>
					</div>';
		}
	}
	echo $output;

?>