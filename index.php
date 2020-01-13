<?php require_once('inc/common/header.php'); ?>
<?php
	include('inc/connection.php');
	include('inc/function.php');
?>

<div id="specify_products">
	<div class="carousel" style="margin-top:120px;">
		<div id="carousel-caption" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-caption" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-caption" data-slide-to="1"></li>
				<li data-target="#carousel-caption" data-slide-to="2"></li>
				<li data-target="#carousel-caption" data-slide-to="3"></li>
			</ol>
			<div class="carousel-inner">

				<div class="carousel-item active">
					<img src="img/slider/pic5.jpg" class="d-block w-100" alt="Slider pic1">
				</div>
				<div class="carousel-item">
					<img src="img/slider/pic2.jpg" class="d-block w-100" alt="Slider pic2">
				</div>
				<div class="carousel-item">
					<img src="img/slider/pic3.jpg" class="d-block w-100" alt="Slider pic3">
				</div>
				<div class="carousel-item">
					<img src="img/slider/pic4.jpg" class="d-block w-100" alt="Slider pic4">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carousel-caption" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel-caption" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="container">

		<div>
			<!-- Change products by click link -->

			<h2 style="margin-top:60px;">Products</h2>

			<div class="row text-center py-4 owl-carousel" id="display_products">
				<!-- Fetching the slider products -->

			</div>

		</div> <!-- Close link click div -->

	</div>
</div>

<?php require_once('inc/common/footer.php'); ?>

<script>
	$(document).ready(function() {

		load_products();
		// Loading the 10 Products to php
		function load_products() {
			$.ajax({
				method: "POST",
				url: "inc/fetch_products.php",
				success: function(data) {
					$('#display_products').html(data);
					$('.owl-carousel').owlCarousel({
						items: 4,
						loop: true,
						margin: 150,
						autoplay: true,
						autoplayTimeout: 3000,
						autoplayHoverPause: true
					});
				}
			});
		}


		
	});
</script>