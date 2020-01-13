<?php require_once('../inc/common/header.admin.php'); ?>
<div class="container-fluid">

	<!-- Table Content -->
	<input type="text" class="form-control" id="searchbox" placeholder="Search By Anythings..."> <!-- Search panel -->
	<table id="CustomerTable" class="table table-striped table-bordered" style="width:100%; font-size:13px;">
		<thead>
			<tr>
				<th style="max-width: 160px;min-width: 160px;">Actions</th>
				<th>Customer ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Contact No</th>
			</tr>
		</thead>
	</table>
</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/customer.js"></script>
<script>
	$('#top-title').text("Customers");
	$('title').text("LKMart || Admin Panel Customers");
</script>