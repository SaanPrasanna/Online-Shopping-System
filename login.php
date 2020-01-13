<?php
	require_once('inc/common/header.php');
	include('inc/connection.php');

	$fname = "";
	if(isset($_SESSION['fname'])){
		$fname = $_SESSION['fname'];
	}else if(isset($_COOKIE['fname'])){
		$fname = $_COOKIE['fname'];
	}

	if(trim($fname) != ""){
		header('location:index.php?redirect=illega_login');
	}
?>
<div id="specify_products">
	<div class="container" style="margin-top:150px;">
		<div class="text-center py-3">
			<?php 
				//Find time to set greetings
				date_default_timezone_set("Asia/Colombo");
				$hour =  date('G');
				$msg = "";
				if(($hour >= 5) && ($hour <= 11)){
					$msg = "Good Morning";
				}else if(($hour >= 12) && ($hour <= 16)){
					$msg = "Good Afternoon";
				}else if(( $hour >= 17 || $hour < 5 )){
					$msg = "Good Evening";
				}

			echo "<h1>Hello, ".$msg."</h1>";
			?>
			<h4>Login to LKMart or <a href="./register.php">Create an Account</a></h4>
		</div>
		<div style="margin-left:300px;">
			<form style="width:1000px;" class="py-3">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" class="form-control inpt">
				</div>
				<div class="form group float-right" style="margin-right: 500px;">
				    <!-- <label id="forgot"><a href="#">Forgot Password ?</a></label>				 -->
				</div>
				<div class="form-group">
					<label for="pw" >Password</label>
					<input type="password" id="pw" class="form-control inpt">
				</div>
				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="remember">
				  <label class="custom-control-label" for="remember">Remember me</label>
				</div>
				<div class="form-group float-right">
					<button type="button" id="login" class="btn btn-primary" style="width:200px;margin-right: 500px;">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Footer js part -->
<?php require_once('inc/common/footer.php'); ?>
<?php 
	if (isset($_GET['msg'])) {
		if($_GET['msg'] == 'successful'){
			$script = "<script>";
			$script .= "iziToast.success({
							title: 'Thank you',
							message: 'You are Successfully Registered!',
							position: 'topRight',
						});";
			$script .= "</script>";
			echo $script;
		}
	}

?>
<script>
	$(document).ready(function(){

		$('#login').on('click',function(){
			var email = $('#email').val();
			var pw = $('#pw').val();
			var remember = $('#remember').prop('checked');
			var type = "customer";

			//Getting the get method data to redirect, Checkout.php
			var params = new window.URLSearchParams(window.location.search);
			var value = params.get('cart_data');
			var value = (atob(value));

			$('.inpt').css('border','1px solid #ddd');

			// Validate the Email Address
	        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        var result = regex.test(email);

	        //check Validate email and password
			if(result == false){
				$('#email').css('border','3px solid #f05507');
			}else if(pw < 1){
				$('#pw').css('border','3px solid #f05507');
			}else{
				$.ajax({
					method:"POST",
					url: 'inc/account/logincheck.php',
					data: {email:email,pw:pw,remember:remember,type:type},
					success: function(data){

						if($.trim(data) == "true"){
							if(value == 'cart_not_empty'){
								window.location = "checkout.php?redirect=true";
							}else{
								window.location = "index.php";
							}
						}else{
							iziToast.error({
								title: 'Error',
								message: data,
								position: 'topRight',
							});
						}

					}
				});
			}

		});
	});
</script>