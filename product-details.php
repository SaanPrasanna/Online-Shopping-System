<?php require_once('inc/common/header.php'); ?>
<?php
include('inc/connection.php');
include('inc/function.php');

if (isset($_GET['id'])) {
	$p_id = mysqli_real_escape_string($conn, $_GET['id']);
	$p_id = base64_decode($p_id);
	$sql = "SELECT * FROM product WHERE p_id = '{$p_id}' LIMIT 1;";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		while ($row = mysqli_fetch_assoc($result)) {

			//Generating the discount
			$price = discount($row['u_price'], $row['category']);
?>
			<div id="specify_products">
				<div class="container" style="margin-top:150px; ">

					<section class="product-section">
						<!-- product section -->
						<div class="row">
							<div class="col-lg-6">
								<div style="overflow: hidden; outline: none;margin-top:20px;">
									<div class="product-thumbs-track">
										<div class=""><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" style="width:400px;"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 product-details" style="margin-top:30px; ">
								<h2 class="p-title "><?php echo $row['name']; ?></h2>
								<h3>
									<?php
									//Showing discount 
									if ($row['u_price'] != $price) {
										echo '<s class="text-secondary">Rs. ' . $row['u_price'] . ' </s> &nbsp
										  <span class="text-danger"> Rs.' . $price . ' </span><sup><span class="badge badge-danger">New</span></sup>';
									} else {
										echo '<span class="text-primary">Rs. ' . $row['u_price'] . '</span>';
									}
									?>
								</h3>
								<h5>Available: <kbd><?php echo $row['qty']; ?></kbd> Quantity(s) on Stock.</h5>
								<div class="p-rating">
									<h6>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									</h6>
								</div>
								<div class="quantity">
									<div class="form-group">
										<span>Quantity</span>
										<input type="text" value="1" class="form-control text-center" id="qty" style="width:75px;">
										<input type="hidden" name="hidden_name" id="name<?php echo $row["p_id"]; ?>" value="<?php echo $row["name"]; ?>">
										<input type="hidden" name="hidden_price" id="price<?php echo $row["p_id"]; ?>" value="<?php echo $row["u_price"]; ?>">
										<input type="hidden" name="hidden_price" id="qty<?php echo$row["p_id"]; ?>" value="<?php echo $row["qty"]; ?>" />
										<button type="button" class="btn btn-warning my-2 add_to_cart" name="add" id="<?php echo $row["p_id"]; ?>">Add to Cart</button>
									</div>
								</div>
								<div id="accordion" class="accordion-area">
									<div class="panel">
										<p>
											<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#description" aria-expanded="true" aria-controls="description">
												DESCRIPTION
											</button>
										</p>
										<div class="collapse show" id="description">
											<div class="card card-body">
												<?php echo $row['description']; ?>
											</div>
										</div>
									</div>
									<div class="panel">
										<p>
											<button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#shippings" aria-expanded="false" aria-controls="shippings">
												SHIPPING & RETURNS
											</button>
										</p>
										<div class="collapse" id="shippings">
											<div class="card card-body">
												<h4>7 Days Returns</h4>
												<p>Home Delivery <span>3 - 4 days</span></p>
												<p>We are accept <i class="far fa-credit-card"></i> Credit Card, <i class="fab fa-cc-visa"></i> Visa card, <i class="fab fa-cc-paypal"></i> PayPal and <i class="fab fa-cc-mastercard"></i> Master Card.
													<ul class="list-group list-group-flush">
														<li class="list-group-item">Safty and Faster Delivery Service.</li>
														<li class="list-group-item">We are covered Island wide.</li>
													</ul>
												</p>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</section>
				</div>
				<!-- product section end -->


			</div>
<?php

		}
	} else {
		echo '
			<div id="specify_products">
			<div class="container" style="margin-top:140px; text-align:center;">
				<span class="text-danger display-3" >Product Details Not Found! </span>
			</div></div>';
	}
}
?>

<?php require_once('inc/common/footer.php'); ?>
