<?php session_start(); ?>
<?php 
	include('../inc/connection.php');
	if((isset($_SESSION['uname'])) || (isset($_COOKIE['uname']))){
		header('location:dashboard.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Login || Wi - Fi Registration</title>

	<!-- iziToast Notification CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

		<!-- Bootstrap CDN CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style>
		body{
			background-image: url("../img/Background-Gradient.jpg");
			font-family:Source Sans Pro Regular;
			margin: 0;
			padding:0;
		}

		fieldset{

			margin:0 auto;
			width:410px;
			height:auto;
			background: #ffffff;
			border: 1px;
			box-shadow:2px 10px 15px #323434;
			border-radius:30px;
			margin-top: 40px;
			padding:50px;
		}
		h1,h5{
			text-align: center;
			/*font-family: Proxima Nova Alt Bl;*/
		}

		button{
			width:100%;
		}
		
		label{
			font-size:19px;
		}
	</style>


</head>
<body>

		<fieldset>
			<h1>Login to Continue</h1>
			<h5>Welcome to LKMart Admin Panel</h5><br/>
			<form id="signin">
				<div class="form-group">
					<label for="uname">Username</label>
					<input type="text" class="form-control" id="uname" aria-describedby="emailHelp" placeholder="Enter Username" name="uname" style="border-radius: 15px;">
				</div>
				<div class="form-group">
					<label for="pw">Password</label>
					<input type="password" class="form-control" id="pw" placeholder="Enter Password" name="pw" style="border-radius: 15px;">
				</div>
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="remember">
					<label class="custom-control-label" for="remember">remember me</label>
				</div>
				<button name="login" class="btn btn-primary" style="border-radius: 15px;">Log In</button>
			</form>
		</div> <!-- right Division -->

	</fieldset>		


<!-- Jquery js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap min js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- Custom js -->
	<script src="js/main.js"></script>

	<!-- izitoast Notification js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

	<!-- Owl carousel js sliders -->
	<script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

	<!-- SweetAlert Js Library -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	
	</body>
</html>


<script>
	$(document).ready(function(){
		$('button').click(function(){
			var uname = $('#uname').val().trim();
			var pw = $('#pw').val().trim();
			var remember = '';
			var type = 'administrator';

			if($('#remember').prop('checked')==true){
				remember = 'remember_me';
			}

			$('input').css('border','1px solid #ddd');

			if(uname < 1){
				$('#uname').css('border','2px solid orangered');
			}else if(pw < 1){
				$('#pw').css('border','2px solid orangered');
			}else{
				$.ajax({
					method: "POST",
					data: {uname:uname,pw:pw,remember:remember,type:type},
					url: "../inc/account/logincheck.php",
					success: function(data) {
						if($.trim(data)== 'true'){
							window.location='dashboard.php';
						}else{	
							iziToast.warning({
								title: 'Warning',
								message: data,
								position: 'topRight',
							});
						}		
					}
				});

			}
			return false;
		});
	});
</script>
