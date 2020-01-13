	<!-- Jquery js -->
  <script src="./js/jquery.min.js"></script>

	<!-- Bootstrap min js -->
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>

	<!-- Custom js -->
	<script src="./js/main.js"></script>

	<!-- izitoast Notification js -->
	<script src="./js/noti/iziToast.js"></script>
	<script src="./js/noti/iziToast.min.js"></script>

	<!-- Owl carousel js sliders -->
	<script type="text/javascript" src="./js/owlcarousel/owl.carousel.js"></script>

	<!-- SweetAlert Js Library -->
	<script src="./js/noti/sweetalert.min.js"></script>
	</body>
</html>

<script>
		//Selecting the link clicking category and fetching
		$('#search').on('click', function() {
			var search = $.trim($('#searchbox').val());
			if(search.length > 0){
				$.ajax({
					method: "POST",
					data: {search: search},
					url: "inc/search.php",
					success: function(data) {
						$('#specify_products').html(data);
						// alert(data);
					}
				});

			}
		});

				//Selecting the link clicking category and fetching
		$('.products').on('click', function() {
			var category = $(this).attr('id');
			$.ajax({
				method: "POST",
				data: {
					category: category
				},
				url: "inc/fetch_specify_products.php",
				success: function(data) {
					$('#specify_products').html(data);
					// alert(data);
				}
			});
		});

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
				}
			});
		}

		$('#cart-popover').popover({
			html : true,
			container: 'body',
			content:function(){
				return $('#popover_content_wrapper').html();
			}
		});
		$('#profile-popover').popover({
			html : true,
			container: 'body',
			content:function(){
				return $('#popover_profile_wrapper').html();
			}
		});

		$(document).on('click','#clear_cart',function(){
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
		});


		//Addeding Products to the shopping cart
		$(document).on('click', ".add_to_cart", function() {
			var product_id = $(this).attr('id');
			var product_name = $('#name' + product_id).val();
			var product_price = $('#price' + product_id).val();
			var available_qty = $('#qty' + product_id).val();
			var product_qty = 1;
			var action = 'add';
			if(available_qty > 0){
				$.ajax({
					method: "POST",
					url: "inc/action.php",
					data: {action: action,product_id: product_id,product_name: product_name,product_price: product_price,product_qty: product_qty},
					success: function(data) {
						$('#cart-popover').popover('hide');
						fetch_cart_detials();
						iziToast.success({
							title: 'Message',
							message: product_name + ' Add to Cart',
							position: 'bottomRight',
						});
					}
				});

			}else{
				iziToast.warning({
					title: 'Message',
					message: product_name + ' Out of the stock',
					position: 'bottomRight',
				});
			}
		});

		cart_load();

		function cart_load() {
			$.ajax({
				url: "inc/fetch_cart_details.php",
				method: "POST",
				dataType: "json",
				success: function(data) {
					$('#fetch_checkout').html(data.output);
					$('#price').text('Rs. ' + data.total_price);
				}
			});
		}
</script>