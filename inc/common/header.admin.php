<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="LKMart">
	<meta name="keywords" content="HTML, CSS, PHP, JSON, JS">
	<meta name="author" content="Sandun Prasanna Mapa">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>LKMart || Admin panel</title>

	<link rel="stylesheet" href="./../css/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./../css/datatables/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="./../css/datatables/buttons.bootstrap4.min.css">
	
    <link rel="stylesheet" href="./../css/admin_style.css" type="text/css">
	<!-- <link rel="stylesheet" type="text/css" href="css/table.css"> -->
	
	<!-- Fontawesome CDN CSS -->
	<link rel="stylesheet" href="./../css/noti/sweetalert.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

	<!-- izitoast Notification  -->
	<link rel="stylesheet" href="./../css/noti/iziToast.css">
	<link rel="stylesheet" href="./../css/noti/iziToast.min.css">

    <script src="./../js/jquery.min.js"></script>
    <script src="./../js/bootstrap3-typeahead.min.js"></script>
    <script src="./../js/Chart.min.js"></script>
	
</head>
<body>
	<div class="wrapper">

		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3><a href="dashboard.php">Dashboard</a></h3>
			</div>

			<ul class="list-unstyled components">

				<li class="main" id="products">
					<a href="#">Products</a>
				</li>
				<li class="main" id="manageproducts">
					<a href="#">Manage Products</a>
				</li>
				<li class="main" id="order">
					<a href="#">Orders</a>
				</li>
				<li class="main" id="customer">
					<a href="#">Customer</a>
				</li>
				<li class="main" id="supplier">
					<a href="#">Supplier</a>
				</li>
				<li class="main" id="courier">
					<a href="#">Courier</a>
				</li>
				<li class="main" id="administrator">
					<a href="#">Administrator</a>
				</li>

			</ul>

		</nav> <!-- navbar close -->

		<!-- Page Content  -->
		<div id="content">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse" class="btn btn-info">
						<i class="fas fa-align-left"></i>
						<span>Show/ Hide Menu</span>
					</button>
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-align-justify"></i>
					</button>
	<!-- 				<div class="content ml-5" style="font-size:25px;"></div> -->
					<h2 id='top-title' style="margin-left:100px;"></h2>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item">	
								<div class="btn-group dropleft">
									<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php
									$uname = "";
									if(isset($_SESSION['uname'])){
										$uname = $_SESSION['uname'];
									}else if(isset($_COOKIE['uname'])){
										$uname = $_COOKIE['uname'];
									}
									if(trim($uname) != ""){
										echo $uname;
									}else{
										header('location:./index.php?redirect=true');
									}
									?>
									</button>
									<div class="dropdown-menu">
										<a href="./administrator.php"><button class="dropdown-item" >Profile</button></a>
										<a href="./logout.php"><button class="dropdown-item" id="logout">Logout</button></a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>