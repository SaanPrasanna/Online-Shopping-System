<?php require_once('./inc/common/header.php'); ?>
<div class="container " style="margin-top:150px;">
	<div id="specify_products">
		<div class="text-center py-3 ">
			<h1><?php echo ucfirst($fname); ?> ! Change your profile</h1>
		</div>
		<div style="width:600px; margin-left: 250px;">
			<form >
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">First and last name</span>
						</div>
						<input type="text" aria-label="First name" class="form-control" id="fname">
						<input type="text" aria-label="Last name" class="form-control" id="lname">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Email Address</span>
						</div>
						<input type="text" class="form-control" id="email" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Contact Number</span>
						</div>
						<input type="text" class="form-control" id="number" >
					</div>
				</div>	
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">New Password</span>
						</div>
						<input type="password" class="form-control" id="password">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Confirm Password</span>
						</div>
						<input type="password" class="form-control" id="cpassword">
					</div>
				</div>
				<div class="form-group float-right">
					<div class="input-group mb-3">
						<input type="hidden" class="form-control" id="cid" name="cid" value="<?php echo $_SESSION['cid']; ?>">
						<button type="button" id="change" class="btn btn-success px-5">Change</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once('./inc/common/footer.php'); ?>
<script>
	$(document).ready(function(){

		load_profiledata();

		function load_profiledata(){
			var cid = $('#cid').val()
			$.ajax({
				method: "POST",
				url: "./inc/datatable/fetch_single_data.php",
				data: {cid:cid},
				dataType: "json",
				success: function(data){
					$('#fname').val(data.fname);
					$('#lname').val(data.lname);
					$('#email').val(data.email);
					$('#number').val(data.number);
				}
			});
		}

		$('#change').on('click',function(){
			var cid = $('#cid').val();			
			var fname = $.trim($('#fname').val());
			var lname = $.trim($('#lname').val());
			var email = $.trim($('#email').val());
			var number = $.trim($('#number').val());
			var password = $.trim($('#password').val());
			var cpassword = $.trim($('#cpassword').val());
			var operation = 'change';

			$('input').css('border','1px solid #ddd');

			if(fname.length < 1){
				$('#fname').css('border','2px solid orangered');
			}else if (lname.length < 1) {
				$('#number').css('border','2px solid orangered');
			}else if(password.length < 1){
				$('#password').css('border','2px solid orangered');
			}else if(cpassword !== password){
				$('#cpassword').css('border','2px solid orangered');
				$('#password').css('border','2px solid orangered');
			}else{
				var formData = new FormData();
				formData.append("cid", cid);
				formData.append("fname", fname);
				formData.append("lname", lname);
				formData.append("number", number);
				formData.append("password", password);
				formData.append("operation", operation);

				$.ajax({
					method: "POST",
					url: "./inc/action.php",
					data:formData,
					processData:false,
        			cache:false,
        			contentType:false,
					success:function(data){
						if($.trim(data) == 'update'){
							iziToast.warning({
								title: 'Info',
								message: 'If you change ur Name, Please Sign Out and Sign In Again. Thank u',
								position: 'topRight',
							});
							iziToast.success({
								title: 'Success',
								message: 'Account Updated',
								position: 'topRight',
							});
							$('#password').val('');
							$('#cpassword').val('');
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