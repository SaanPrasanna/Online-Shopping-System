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
		header('location:index.php?redirect=illega_register');
	}
?>
<div id="specify_products">
	<div class="container" style="margin-top:150px;">
		<div class="text-center py-3">
			<h1>Create an Account</h1>
			<h4>Already a member? <a href="./login.php">Sign in</a></h4>
		</div>
		<div style="margin-left:300px;">
			<form >
				<div class="form-group">
					<label id="forgot">Name</label>
					<div class="row">
						<div class="col-md-4">
							<input type="text" class="form-control" placeholder="First name" id="fname" style="width:240px;">
						</div>
						<div class="col">
							<input type="text" class="form-control" placeholder="Last name" id="lname" style="width:240px;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email" >Email</label>
					<input type="text" id="email" class="form-control inpt" style="width:520px;" placeholder="E-Mail">
				</div>
				<div class="form-group">
					<label for="pw" >Password</label>
					<input type="password" id="pw" class="form-control inpt" style="width:520px;" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="cpw" >Confirm Password</label>
					<input type="password" id="cpw" class="form-control inpt" style="width:520px;" placeholder="Confirm Password">
				</div>
				<div class="form-group float-right">
					<button type="button" id="create" class="btn btn-secondary" style="width:200px;margin-right: 290px;">Create Account</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Footer js part -->
<?php require_once('inc/common/footer.php'); ?>
<script>
	$(document).ready(function(){

		$('#create').on('click',function(){

			var fname = $.trim($('#fname').val());
			var lname = $.trim($('#lname').val());
			var email = $.trim($('#email').val());
			var pw = $.trim($('#pw').val());
			var cpw = $.trim($('#cpw').val());

			$('input').css('border','1px solid #ddd');

			// Validate the Email Address
	        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	        var result = regex.test(email);

	        //check Validate email and password
			if(fname < 1){
				$('#fname').css('border','3px solid #f05507');
			}else if(lname < 1){
				$('#lname').css('border','3px solid #f05507');
			}else if(result == false){
				$('#email').css('border','3px solid #f05507');
			}else if(pw < 1){
				$('#pw').css('border','3px solid #f05507');
			}else if(cpw < 1){
				$('#cpw').css('border','3px solid #f05507');
			}else if(pw != cpw){
				$('#pw').css('border','3px solid #f05507');
				$('#cpw').css('border','3px solid #f05507');
			}else{
				$.ajax({
					method:"POST",
					url: 'inc/account/register.php',
					data: {fname:fname,lname:lname,email:email,pw:pw},
					success: function(data){			
						if($.trim(data) == "true"){
							window.location = "login.php?msg=successful";
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