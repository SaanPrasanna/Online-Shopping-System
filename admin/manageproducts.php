<?php require_once('../inc/common/header.admin.php'); ?>
<div class="container-fluid">

	<!-- Table Content -->
	<input type="text" class="form-control" id="searchbox" placeholder="Search By Anythings..."> <!-- Search panel -->
	<table id="ManageTable" class="table table-striped table-bordered" style="width:100%; font-size:13px;">
		<thead>
			<tr>
				<th style="max-width: 50px;min-width: 50px;">Actions</th>
				<th style="max-width: 100px;min-width: 100px;">Product ID</th>
				<th>Product Name</th>
				<th>Category</th>
				<th>Quantity</th>
			</tr>
		</thead>
	</table>

		<!-- Modal Content -->
	<div id="manage" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="manage_form" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Manage Products</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Product ID</span>
								</div>
								<input type="text" class="form-control" id="p_id" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Product Name</span>
								</div>
								<input type="text" class="form-control" id="name" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Supplier ID</span>
								</div>
								<input type="text" class="form-control" id="supplier_id" maxlength="5"  autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group" style="width:250px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Number of Quantity</span>
								</div>
								<input type="number" class="form-control" id="qty">
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="hidden" name="supplier_id" id="supplier_id" />
						<input type="hidden" name="operation" id="operation" />
						<input type="submit" name="action" id="action" class="btn btn-success" value="Add" style="width: 100px;" />
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/manageproducts.js"></script>
<script>
	$('#top-title').text("Manage Products");
	$('title').text("LKMart || Admin Panel Manage Products");
</script>