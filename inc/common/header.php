<?php 
	session_start();
	ob_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>LK Mart | Online Shopping System</title>

	<meta charset="UTF-8">
	<meta name="description" content="LKMart">
	<meta name="keywords" content="HTML, CSS, PHP, JSON, JS">
	<meta name="author" content="Sandun Prasanna Mapa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- Bootstrap CDN CSS -->
	<link rel="stylesheet" href="./css/bootstrap4/bootstrap.min.css">

	<!-- Fontawesome CDN CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

	<!-- Flaticon for Icon -->
	<link rel="stylesheet" href="css/flaticon.css"/>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css"/>

<!-- 	Notification CDN CSS -->
	<link rel="stylesheet" href="./css/noti/iziToast.css">
	<link rel="stylesheet" href="./css/noti/iziToast.min.css">
	<link rel="stylesheet" href="./css/noti/sweetalert.css"> <!-- SweetAlert CDN Library -->

	<!-- Owl Carousel CDN Slider pluging -->
	<link rel="stylesheet" href="./css/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="./css/owlcarousel/owl.theme.default.min.css">

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.php" class="oss-logo">
							<img src="img/logo2.png" alt="" style="width:160px;">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="top-search-form">
							<input type="text" id="searchbox" placeholder="Search on Product Name ...." class="form-control">
							<button type="button" id="search"><i class="flaticon-search" style="color:#f51167;"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item text-danger pt-3" >
								
								<?php
									$fname = "";
									if(isset($_SESSION['fname'])){
										$fname = $_SESSION['fname'];
									}else if(isset($_COOKIE['fname'])){
										$fname = $_COOKIE['fname'];
									}
									if(trim($fname) != ""){
										echo '<div class="btn-group">
												  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    <i class="fas fa-user-circle">&nbsp</i>'.$fname.'
												  </button>
												  <div class="dropdown-menu">
												    <a class="dropdown-item" href="./profile.php">Chage Profile</a>
												    <a class="dropdown-item" href="./inc/logout.php">Logout</a>
												  </div>
												</div>';

									}else{
										echo '<i class="fas fa-sign-in-alt text-danger" >&nbsp</i><a href="./login.php" class="header-label">Sign In</a> or <a href="./register.php">Sign Up</a>';
									}
								?>
							</div>
							<div id="popover_profile_wrapper" style="display: none;">
								<span id="profile_details" class="btn btn-secondary my-1">Profile</span>
								<span id="profile_details" class="btn btn-secondary my-1 w-500">Logout</span>
							</div>
	
							<div class="up-item" id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart" style="cursor:pointer;">
									
									<i class="fas fa-shopping-cart text-danger"></i>
									<span class="badge badge-pill badge-danger num_of_products" style="font-size:15px;">0</span>
									<span class="total_price" style="font-size:18px;"></span>
									
							</div>


							<div id="popover_content_wrapper" style="display: none">
								<span id="cart_details">									
								<div align="right">
								</div>
								</span>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Second Navbar -->
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="#" id='laptop' class="products">Laptops</a></li>
					<li><a href="#" id='desktop' class="products">Desktops</a></li>
					<li><a href="#" id='printer' class="products">Printers & Scanners</a></li>
					<li><a href="#" id='software' class="products">Softwares</a></li>
					<li><a href="#" id='monitor' class="products">Monitors & Tv</a></li>
					<li><a href="#" id='accessorie' class="products">Accessories</a></li>
				</ul>
			</div>
		</nav>

	</header> <!-- Header section end -->