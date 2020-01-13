<?php require_once('../inc/common/header.admin.php'); ?>
<div class="container-fluid">
	
	<button type="button" id="add" data-toggle="modal" data-target="#couriermodal" class="btn btn-success btn-fg" style="float:left; margin-top:0px;margin-right: 20px;">Add Courier</button>

	<!-- Table Content -->
	<input type="text" class="form-control" id="searchbox" placeholder="Search By Anythings..."> <!-- Search panel -->
	<table id="CourierTable" class="table table-striped table-bordered" style="width:100%; font-size:13px;">
		<thead>
			<tr>
				<th style="max-width: 160px;min-width: 160px;">Actions</th>
				<th>Courier ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Contact Number</th>
				<th>Address</th>
			</tr>
		</thead>
	</table>

		<!-- Modal Content -->
	<div id="couriermodal" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="courier_form" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Title</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">First Name</span>
								</div>
								<input type="text" class="form-control" id="fname">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Last Name</span>
								</div>
								<input type="text" class="form-control" id="lname">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Contact Number</span>
								</div>
								<input type="text" class="form-control" id="number">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Courier Address</span>
								</div>
								<input type="text" class="form-control" id="address">
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="hidden" name="co_id" id="co_id" />
						<input type="hidden" name="operation" id="operation" />
						<input type="submit" name="action" id="action" class="btn btn-success" value="Add" style="width: 100px;" />
					</div>
				</div>
			</form>
		</div>
	</div>

		<!-- View Modal -->
	<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="viewmodallabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-label">Supplier Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body view-body">
					<p><span class="view_title" >Courier ID : </span> <label class="view_co_id ans"></label></p>
					<p><span class="view_title">First Name : </span> <label class="view_fname ans"></label></p>
					<p><span class="view_title">Last Name : </span> <label class="view_lname ans"></label></p>
					<p><span class="view_title">Contact Number : </span> <label class="view_number ans"></label></p>
					<p><span class="view_title">Address : </span> <label class="view_address ans"></label></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/courier.js"></script>
<script>
	$('#top-title').text("Couriers Details");
	$('title').text("LKMart || Admin Panel Corier");
</script>