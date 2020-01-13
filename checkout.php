<?php require_once('inc/common/header.php') ?>
<?php ob_start(); ?>
<?php 

	$fname = "";
	if(isset($_SESSION['fname'])){
		$fname = $_SESSION['fname'];
	}else if(isset($_COOKIE['fname'])){
		$fname = $_COOKIE['fname'];
	}

	if(trim($fname) != ""){
		
	}else{
		ob_end_flush();
		header('location:login.php?cart_data='.base64_encode("cart_not_empty").'');
	}
?>

<div class="container-fluid" style="margin-top:160px;">
	<div id="specify_products">	
	    <div class="row px-5">
	        <div class="col-md-7">
	            <div class="shopping-cart">
	                <h2>My Cart</h2>
	                <hr>
	                <form>
						<div id="fetch_checkout"></div>

	                </form>
	            </div>
	        </div>
	        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

	            <div class="pt-4">
	                <h3>Your Order Details</h3>
	                <hr>
	                <div class="row price-details">
	                    <div class="col-md-6">
	                        <h6>Delivery Charges</h6>
	                        <hr>
	                        <h6>Amount Payable</h6>
	                    </div>
	                    <div class="col-md-6">
	                        <h6>Free</h6>
	                        <hr>
	                        <h6 id="price"></h6>
	                        <input type="hidden" id="getcurrency">
	                        <input type="hidden" id="getcurrency_lkr">
	                    </div>
	                        <div id="paypal-button-container" style="width:100%;z-index: 1;" class="ml-3 mr-3 my-3"></div>
	                    <div class="col-md-6">
	                    </div>
	                </div>
	            </div>

	        </div>
	    </div>
	</div>
</div>


<?php require_once('inc/common/footer.php') ?>
<script src="https://www.paypal.com/sdk/js?client-id=AWCvkxUWzZTWUaj0UNfbcOnepFqg0eZjSs8b8l8JrMnHp31BKWr__YbIjoLpzN5ea94fe0tcT1TYXmis"></script>

<script>
	$(document).ready(function() {

	    // Render the PayPal button into #paypal-button-container
	    paypal.Buttons({

	        // Set up the transaction
	        createOrder: function(data, actions) {

				var test = $('#getcurrency').val();

	            return actions.order.create({
	                purchase_units: [{
	                    amount: {
	                        value: test
	                    }
	                }]
	            });

	        },

	        // Finalize the transaction
	        onApprove: function(data, actions) {
	            return actions.order.capture().then(function(details) {

	                // Show a success message to the buyer
                    swal("Transaction Completed by "+ details.payer.name.given_name + " !" ,"Thank you for purchase","success");
                    console.log(details);//Testing the Transaction array

	                //Passing the data to the purchase_order.php
	                var total_price = $('#getcurrency_lkr').val();
	                var address = '';
	                var address2 = '';
	                var city = '';
	                var city2 = '';
	                //Getting the Transaction ID
	                var transaction_id = details.id;
	                
	                //Address fixing
	                if($.trim(details.purchase_units[0].shipping.address.address_line_1) != ''){
	                	address = details.purchase_units[0].shipping.address.address_line_1;
	                }else{
	                	address = '';
	                }

	                if($.trim(details.purchase_units[0].shipping.address.address_line_2) != ''){
	                	address2 = details.purchase_units[0].shipping.address.address_line_2;
	                }else{
	                	address2 = '';
	                }
	                address = address + ", " + address2;

	                //City fixing
	                if($.trim(details.purchase_units[0].shipping.address.admin_area_2) != ''){
	                	city = details.purchase_units[0].shipping.address.admin_area_2;
	                }else{
	                	city = '';
	                }

	                if($.trim(details.purchase_units[0].shipping.address.admin_area_1) != ''){
	                	city2 = details.purchase_units[0].shipping.address.admin_area_1;
	                }else{
	                	city2 = '';
	                }
	                city = city + ", " + city2;
	                // var address = details.purchase_units[0].shipping.address.address_line_1 + ", " + details.purchase_units[0].shipping.address.address_line_2;
	                // var city = details.purchase_units[0].shipping.address.admin_area_2 + ", " +  details.purchase_units[0].shipping.address.admin_area_1;
	                var postal_code = details.purchase_units[0].shipping.address.postal_code;

	                $.ajax({
	                	method: "POST",
	                	url: "inc/purchase_order.php",
	                	data: {total_price:total_price,address:address,city:city,postal_code:postal_code,transaction_id:transaction_id},
	                	success: function(data){
							fetch_cart_detials();
							cart_load();

							if($.trim(data) == "true"){

								//Clear the Shopping cart
								var action = 'empty';
								$.ajax({
									method: "POST",
									data: {action:action},
									url: "inc/action.php",
									success: function(data){
										fetch_cart_detials();
										cart_load();
										$('#cart-popover').popover('hide');
										iziToast.error({
											title: 'Message',
											message: 'Shopping Cart Cleared',
											position: 'bottomRight',
										});
									}
								});
							}
	                	}
	                });
	            });
	        }


	    }).render('#paypal-button-container');




		fetch_cart_detials();

		//Header section Shopping cart values Displaying
		function fetch_cart_detials() {
			$.ajax({
				url: "inc/fetch_cart_details.php",
				method: "POST",
				dataType: "json",
				success: function(data) {
					$('.num_of_products').text(data.product_qtys); //Passing json values to header section
					$('.total_price').text('Rs. ' + data.total_price); // Passing json values to header section 
					$('#cart_details').html(data.popover);
					var lkr = data.LKR
					$.getJSON('https://free.currconv.com/api/v7/convert?apiKey=ff06932da25de3cd3615&q=LKR_USD&compact=y', function(currency){
						var dollar = currency.LKR_USD.val * lkr;
						$('#getcurrency').val(dollar.toFixed(2));
						$('#getcurrency_lkr').val(lkr);
					});
				}
			});
		}



		$(document).on('click', '.products', function() {
			var category = $(this).attr('id');
			$.ajax({
				method: "POST",
				data: {
					category: category
				},
				url: "inc/fetch_specify_products.php",
				success: function(data) {
					$('#specify_products').html(data);
				}
			});

		});




		//Addeding the quantites
		$(document).on('click','.plus',function(){
			var product_id = $(this).attr('id');
			var product_name = $('#name' + product_id).val();
			var product_price = $('#price' + product_id).val();
			var product_qty = 1;
			var action = 'add';

			$.ajax({
				method: "POST",
				url: "inc/action.php",
				data: {
					action: action,
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					product_qty: product_qty
				},
				success: function(data) {
					fetch_cart_detials();
					cart_load();
					iziToast.success({
						title: 'Message',
						message: product_name + ' Add to Cart',
						position: 'bottomRight',
					});
				}
			});

		});

		//Removing the quantities
		$(document).on('click','.minus',function(){
			var product_id = $(this).attr('id');
			var product_name = $('#name' + product_id).val();
			var product_qty = 1;
			var available_qty = $('#qty'+product_id).val();
			var action = 'remove';

			if(available_qty > 1){
				$.ajax({
					method: "POST",
					url: "inc/action.php",
					data: {
						action: action,
						product_id: product_id,
						product_qty: product_qty
					},
					success: function(data) {
						fetch_cart_detials();
						cart_load();
							iziToast.warning({
							title: 'Message',
							message: product_name + ' Remove in Cart',
							position: 'bottomRight',
						});
					}
				});
			}

		});

		//Delete the quantities
		$(document).on('click','.delete',function(){
			var product_id = $(this).attr('id');
			var product_name = $('#name' + product_id).val();
			var action = 'delete';

			$.ajax({
				method: "POST",
				url: "inc/action.php",
				data: {
					action: action,
					product_id: product_id,
				},
				success: function(data) {
					fetch_cart_detials();
					cart_load();
					iziToast.warning({
						title: 'Message',
						message: product_name + ' Deleted in Cart',
						position: 'bottomRight',
					});
				}
			});

		});		





	});
</script>
