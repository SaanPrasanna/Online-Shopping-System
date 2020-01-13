<?php require_once('../inc/common/header.admin.php'); ?>
<?php include('../inc/function.php'); ?>
	<div class="container-fluid">

	<button type="button" id="add" data-toggle="modal" data-target="#product" class="btn btn-success btn-fg" style="float:left; margin-top:0px;margin-right: 20px;">Add Product</button>


	<!-- Table Content -->
	<input type="text" class="form-control" id="searchbox" placeholder="Search By Anythings..."> <!-- Search panel -->
	<table id="ProductsTable" class="table table-striped table-bordered" style="width:100%; font-size:13px;">
		<thead>
			<tr>
				<th style="max-width: 160px;min-width: 160px;">Actions</th>
				<th>Product ID</th>
				<th style="max-width: 160px;min-width: 160px;">Name</th>
				<th>Category</th>
				<th>Warranty</th>
				<th style="max-width: 120px;min-width: 120px;">Supply Price</th>
				<th>Selling Price</th>
				<th>Quantity</th>
				<th style="max-width: 55px;min-width: 55px;">Re-Order</th>

			</tr>
		</thead>
	</table>
		<!-- Modal Content -->
	<div id="product" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="product_form" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Title</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Product ID</span>
								</div>
								<input type="text" class="form-control" id="p_id">
							</div>
						</div>						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Product Name</span>
								</div>
								<input type="text" class="form-control" id="name">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="image">
									<label class="custom-file-label" for="image">Choose Product image</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Category</label><br>
							<div class="btn-group-sm btn-group-toggle" data-toggle="buttons" style="font-size: 10px;">
								<label class="btn btn-outline-secondary laptop">
									<input type="radio" name="options" id="laptop" value="laptop" class="options"> Laptop
								</label>
								<label class="btn btn-outline-secondary desktop">
									<input type="radio" name="options" id="desktop" value="desktop" class="options"> Desktop
								</label>
								<label class="btn btn-outline-secondary printer">
									<input type="radio" name="options" id="printer" value="printer" class="options"> Printer
								</label>
								<label class="btn btn-outline-secondary software">
									<input type="radio" name="options" id="software" value="software" class="options"> Software
								</label>
								<label class="btn btn-outline-secondary monitor">
									<input type="radio" name="options" id="monitor" value="monitor" class="options"> Monitor
								</label>
								<label class="btn btn-outline-secondary accessorie">
									<input type="radio" name="options" id="accessorie" value="accessorie" class="options"> Accessorie
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Description Line 1</span>
								</div>
								<input type="text" class="form-control" id="d1">
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Description Line 2</span>
								</div>
								<input type="text" class="form-control" id="d2">
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Description Line 3</span>
								</div>
								<input type="text" class="form-control" id="d3" >
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" >Description Line 4</span>
								</div>
								<input type="text" class="form-control" id="d4">
							</div>
						</div>
						<div class="form-group">

							<div class="input-group float-right" style="width:200px;margin-top: 0px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Unit Price</span>
								</div>
								<input type="number" class="form-control" id="u_price">
							</div>
							<div class="input-group" style="width:230px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Supply Price</span>
								</div>
								<input type="number" class="form-control" id="s_price">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group" style="width:200px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Warranty</span>
								</div>
								<input type="number" class="form-control" id="warranty">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group" style="width:200px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="">Re-Order</span>
								</div>
								<input type="number" class="form-control" id="reorder">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="p_id" id="p_id" />
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
					<h5 class="modal-title" id="modal-label">Product Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body view-body">
					<p><span class="view_title" >Product No : </span> <label class="view_pid ans"></label></p>
					<p><span class="view_title">Product Name : </span> <label class="view_name ans"></label></p>
					<p><span class="view_title">Category : </span> <label class="view_category ans"></label></p>
					<p><span class="view_title">Description : </span> <label class="view_desc ans"></label></p>
					<p><span class="view_title">Warranty : </span> <label class="view_warranty ans"></label></p>
					<p><span class="view_title">Supplier Price : </span> <label class="view_s_price ans"></label></p>
					<p><span class="view_title">Selling Price : </span> <label class="view_u_price ans"></label></p>
					<p><span class="view_title">Quantity : </span> <label class="view_qty ans"></label></p>
					<p><span class="view_title">Reorder : </span> <label class="view_re_order ans"></label></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	</div>
<?php require_once('../inc/common/footer.admin.php'); ?>
<script src="../js/admin-panel/products.js"></script>
<script>
	$(document).ready(function(){
		$('#top-title').text("Products");
		$('title').text("LKMart || Admin Panel Products");
	});
</script>