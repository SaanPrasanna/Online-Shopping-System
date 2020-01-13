<?php require_once('../inc/common/header.admin.php'); ?>
<div class="container-fluid">


	<!-- Table Content -->
	<input type="text" class="form-control" id="searchbox" placeholder="Search By Anythings..."> <!-- Search panel -->
	<table id="OrderTable" class="table table-striped table-bordered" style="width:100%; font-size:13px;">
		<thead>
			<tr>
				<th>Order ID</th>
				<th>Customer ID</th>
				<th>Courier ID</th>
				<th>Amount</th>
				<th>Date</th>
				<th>Time</th>
				<th>Finished Date</th>
				<th>Status</th>
				<th style="max-width: 130px;min-width: 130px;">Actions</th>
			</tr>
		</thead>
	</table>


			<!-- View Modal -->
	<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="viewmodallabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-label">Order Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body view-body">
					<p id="order_details"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/order.js"></script>
<script>
	$('#top-title').text("Orders");
	$('title').text("LKMart || Admin Panel Orders");
</script>